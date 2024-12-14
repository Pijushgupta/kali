<script setup>

import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import Underline from "@tiptap/extension-underline";
import CodeBlockLowlight from '@tiptap/extension-code-block-lowlight';

import css from 'highlight.js/lib/languages/css';
import js from 'highlight.js/lib/languages/javascript';
import ts from 'highlight.js/lib/languages/typescript';
import html from 'highlight.js/lib/languages/xml';
import php from 'highlight.js/lib/languages/php';



// load all languages with "all" or common languages with "common"
import { all, createLowlight } from 'lowlight';

// create a lowlight instance
const lowlight = createLowlight(all)

// you can also register languages
lowlight.register('html', html)
lowlight.register('css', css)
lowlight.register('js', js)
lowlight.register('ts', ts)
lowlight.register('php', php)

// Props
const props = defineProps({
    post: Object,
});

// Extract content from props
const content = props.post[0]?.post_content || "";
const postTitle = props.post[0]?.post_title || "";

// Initialize the editor using useEditor
const editor = useEditor({
    content: content,
    extensions: [StarterKit, Underline, CodeBlockLowlight.configure({ lowlight, }),],
});
</script>

<template>
    <div class="flex flex-row">
        <div class="w-full">
            <div class="mb-6">
                <input type="text" id="default-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                    v-bind:value="postTitle" placeholder="Add title" />
            </div>
            <div>
                <!-- Button area -->
                <div
                    class="border border-b-0 border-gray-300 dark:border-gray-600 rounded-lg rounded-b-none p-2 bg-gray-50 dark:bg-gray-700">

                    <!-- basic buttons -->
                    <div class="shadow dark:shadow-gray-800 rounded-lg inline-block overflow-hidden mr-4 last:mr-0">
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('bold') }"
                            @click="editor?.chain().focus().toggleBold().run()" class="editorButton">
                            <b>B</b>
                        </button>
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('italic') }"
                            @click="editor?.chain().focus().toggleItalic().run()" class="editorButton italic">
                            I
                        </button>
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('underline') }"
                            @click="editor?.chain().focus().toggleUnderline().run()" class="editorButton underline ">
                            U
                        </button>
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('strike') }"
                            @click="editor?.chain().focus().toggleStrike().run()" class="editorButton  ">
                            <s>S</s>
                        </button>
                    </div>
                    <!-- end basic buttons -->
                    <!-- type buttons -->
                    <div class="shadow dark:shadow-gray-800 rounded-lg inline-block overflow-hidden mr-4 last:mr-0">
                        <button type="button"
                            :class="{ 'is-editor-button-active': editor?.isActive('heading', { level: 1 }) }"
                            @click="editor?.chain().focus().toggleHeading({ level: 1 }).run()" class="editorButton">
                            h1
                        </button>
                        <button type="button"
                            :class="{ 'is-editor-button-active': editor?.isActive('heading', { level: 2 }) }"
                            @click="editor?.chain().focus().toggleHeading({ level: 2 }).run()" class="editorButton">
                            h2
                        </button>
                        <button type="button"
                            :class="{ 'is-editor-button-active': editor?.isActive('heading', { level: 3 }) }"
                            @click="editor?.chain().focus().toggleHeading({ level: 3 }).run()" class="editorButton">
                            h3
                        </button>

                        <button type="button"
                            :class="{ 'is-editor-button-active': editor?.isActive('heading', { level: 4 }) }"
                            @click="editor?.chain().focus().toggleHeading({ level: 4 }).run()" class="editorButton">
                            h4
                        </button>
                        <button type="button"
                            :class="{ 'is-editor-button-active': editor?.isActive('heading', { level: 5 }) }"
                            @click="editor?.chain().focus().toggleHeading({ level: 5 }).run()" class="editorButton">
                            h5
                        </button>
                        <button type="button"
                            :class="{ 'is-editor-button-active': editor?.isActive('heading', { level: 6 }) }"
                            @click="editor?.chain().focus().toggleHeading({ level: 6 }).run()" class="editorButton">
                            h6
                        </button>
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('paragraph') }"
                            @click="editor?.chain().focus().toggleParagraph().run()" class="editorButton">
                            P
                        </button>
                        <button type="button" data-tooltip-target="code-tooltip"
                            :class="{ 'is-editor-button-active': editor?.isActive('codeBlock') }"
                            @click="editor?.chain().focus().toggleCodeBlock().run()" class="editorButton">
                            { }
                        </button>
                        <div id="code-tooltip" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 dark:text-gray-400 transition-opacity duration-300 bg-gray-50  rounded-lg  opacity-0 tooltip dark:bg-gray-700 shadow dark:shadow-gray-800">
                            ```php , ```js, ````css

                        </div>
                    </div>
                    <!-- end type buttons -->
                    <!-- list buttons -->
                    <div class="shadow dark:shadow-gray-800 rounded-lg inline-block overflow-hidden mr-4 last:mr-0">
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('orderedList') }"
                            @click="editor?.chain().focus().toggleOrderedList().run()" class="editorButton !px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                            </svg>
                        </button>
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('bulletList') }"
                            @click="editor?.chain().focus().toggleBulletList().run()" class="editorButton !px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </button>
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('blockquote') }"
                            @click="editor?.chain().focus().toggleBlockquote().run()" class="editorButton !px-2">
                            <svg class="size-5" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.42503 3.44136C10.0561 3.23654 10.7837 3.2402 11.3792 3.54623C12.7532 4.25224 13.3477 6.07191 12.7946 8C12.5465 8.8649 12.1102 9.70472 11.1861 10.5524C10.262 11.4 8.98034 11.9 8.38571 11.9C8.17269 11.9 8 11.7321 8 11.525C8 11.3179 8.17644 11.15 8.38571 11.15C9.06497 11.15 9.67189 10.7804 10.3906 10.236C10.9406 9.8193 11.3701 9.28633 11.608 8.82191C12.0628 7.93367 12.0782 6.68174 11.3433 6.34901C10.9904 6.73455 10.5295 6.95946 9.97725 6.95946C8.7773 6.95946 8.0701 5.99412 8.10051 5.12009C8.12957 4.28474 8.66032 3.68954 9.42503 3.44136ZM3.42503 3.44136C4.05614 3.23654 4.78366 3.2402 5.37923 3.54623C6.7532 4.25224 7.34766 6.07191 6.79462 8C6.54654 8.8649 6.11019 9.70472 5.1861 10.5524C4.26201 11.4 2.98034 11.9 2.38571 11.9C2.17269 11.9 2 11.7321 2 11.525C2 11.3179 2.17644 11.15 2.38571 11.15C3.06497 11.15 3.67189 10.7804 4.39058 10.236C4.94065 9.8193 5.37014 9.28633 5.60797 8.82191C6.06282 7.93367 6.07821 6.68174 5.3433 6.34901C4.99037 6.73455 4.52948 6.95946 3.97725 6.95946C2.7773 6.95946 2.0701 5.99412 2.10051 5.12009C2.12957 4.28474 2.66032 3.68954 3.42503 3.44136Z"
                                    fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button type="button" :class="{ 'is-editor-button-active': editor?.isActive('horizontalRule') }"
                            @click="editor.chain().focus().setHorizontalRule().run()" class="editorButton !px-2">
                            <svg class="size-5" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.25 7.5C2.25 7.22386 2.47386 7 2.75 7H12.25C12.5261 7 12.75 7.22386 12.75 7.5C12.75 7.77614 12.5261 8 12.25 8H2.75C2.47386 8 2.25 7.77614 2.25 7.5Z"
                                    fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- end list buttons -->
                    <!-- image and link buttons  -->
                    <div class="shadow dark:shadow-gray-800 rounded-lg inline-block overflow-hidden mr-4 last:mr-0">

                    </div>
                    <!-- end image and link buttons  -->
                </div>
                <editor-content :editor="editor"
                    class="editor-content rounded-t-none prose dark:prose-invert lg:prose-lg max-w-full h-[600px] overflow-y-auto block p-2.5 w-full text-sm text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300  dark:border-gray-600 dark:placeholder-gray-400 " />
            </div>
        </div>
        <div class="md:w-[400px] flex flex-col">
            
        </div>
    </div>
</template>

<style lang="scss">
/* Basic editor styles */
.tiptap {
    :first-child {
        margin-top: 0;
    }

    pre code.hljs {
        display: block;
        overflow-x: auto;
        padding: 1em
    }

    code.hljs {
        padding: 3px 5px
    }

    /*

    Style with support for rainbow parens

    */
    .hljs {
        background: #474949;
        color: #d1d9e1
    }

    .hljs-comment,
    .hljs-quote {
        color: #969896;
        font-style: italic
    }

    .hljs-keyword,
    .hljs-selector-tag,
    .hljs-literal,
    .hljs-type,
    .hljs-addition {
        color: #cc99cc
    }

    .hljs-number,
    .hljs-selector-attr,
    .hljs-selector-pseudo {
        color: #f99157
    }

    .hljs-string,
    .hljs-doctag,
    .hljs-regexp {
        color: #8abeb7
    }

    .hljs-title,
    .hljs-name,
    .hljs-section,
    .hljs-built_in {
        color: #b5bd68
    }

    .hljs-variable,
    .hljs-template-variable,
    .hljs-selector-id,
    .hljs-title.class_,
    .hljs-class .hljs-title {
        color: #ffcc66
    }

    .hljs-section,
    .hljs-name,
    .hljs-strong {
        font-weight: bold
    }

    .hljs-symbol,
    .hljs-bullet,
    .hljs-subst,
    .hljs-meta,
    .hljs-link {
        color: #f99157
    }

    .hljs-deletion {
        color: #dc322f
    }

    .hljs-formula {
        background: #eee8d5
    }

    .hljs-attr,
    .hljs-attribute {
        color: #81a2be
    }

    .hljs-emphasis {
        font-style: italic
    }
}
</style>