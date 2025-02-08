<!-- Toastify.vue -->
<!-- actual toast html -->
<script setup>
import { useToast } from "./useToast";
import Icon from "@/icons/Icon.vue";

const {removeToast,toasts} = useToast();

</script>

<template>

    <Teleport  v-for="toast in toasts" :key="toast.id" :to="toast.location">
        <div id="toast-default"
        class="pointer-events-auto z-50 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 my-1 transition ease-in-out  "
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
            
            <Icon :icon-name="toast.icon"/>
            
            <span class="sr-only">{{ toast.iconSR }}</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ toast.content }}</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            @click="removeToast(toast.id)" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
        </div>
    </Teleport>
</template>