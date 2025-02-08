<script setup>
import { reactive, ref, computed, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import Multiselect from 'vue-multiselect'
import Icon from '@/icons/Icon.vue';
import IconsModal from '@/icons/IconsModal.vue';
import {useToast} from '@/toast/useToast';


/**
 * arguments aka props
 */
const props = defineProps({
    postType: Object,
    errors: Object,
    flash:Object
});

const data = reactive({
    id: props.postType?.id || null,
    label: props.postType?.label || null,
    name: props.postType?.name || null,
    is_hidden: props.postType?.is_hidden == 1? true:false || false,
    taxonomy: props.postType?.taxonomy || null,
    support: props.postType?.support || null,
    hierarchical: props.postType?.hierarchical== 1? true:false || false,
    menu_icon: props.postType?.menu_icon || null,
    slug: props.postType?.slug || null,

});

/**
 * TODO:get taxonomy and support  list form database
 */
const taxonomyList = ['list', 'of', 'options', 'pijush', 'gupta'];
const supportList = ['editor', 'feature-image',]

/**
 * submitting the data 
 */
const submit = () => {
    router.post('/dashboard/posttype/save', data);
}
/**
 * for icon modal
 */
const open = ref(false);

const resolvedIcon = computed(() => data?.menu_icon || 'IconIcons')

/**
 * toasts
 */
const errors = ref([])
watch(()=>props.errors,(newErrors)=>{
    if(newErrors){
        errors.value = Object.entries(newErrors).map((error)=> error);
    }else{
        errors.value = [];
    }
},{ immediate: true, deep: true })

const {addToast} = useToast();
watch(()=>props.flash,(newFlash)=>{
    //info toast 
    if(newFlash){
        // flash.value = Object.entries(newFlash).map((f)=>f);
        addToast({
        type: "info",
        location: "bottom-right",
        content: newFlash.status,
        icon: "IconInfoSquareRounded",
        iconSr: "Information",
        });
    }else{
        flash.value = [];
    }
});
</script>
<template>
    
    <div class="max-w-5xl mx-auto ">
        
        

        

        <!-- icons modal -->
        <!-- two way binding using emit and v-modal, since v-modal alone can't do child-parent two way binding so i used emit-->
        <IconsModal v-if="open" v-model:selectedIcon="data.menu_icon" v-model:isOpen="open" />
        <!-- icons modal ends -->

        <form @submit.prevent="submit">
            <div class="grid gap-6 grid-cols-2">
                <div class="relative">
                    <div class="absolute left-2.5 top-2.5 pr-2.5 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right size-6 stroke-gray-400">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 7l5 5l-5 5" />
                            <path d="M13 7l5 5l-5 5" />
                        </svg>
                    </div>
                    <input type="text"
                        class="w-full text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 "
                        placeholder="Label" v-model="data.label">
                </div>
                <div class="relative">
                    <div class="absolute left-2.5 top-2.5 pr-2.5 flex justify-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-language size-6 stroke-gray-400">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 5h7" />
                            <path d="M9 3v2c0 4.418 -2.239 8 -5 8" />
                            <path d="M5 9c0 2.144 2.952 3.908 6.7 4" />
                            <path d="M12 20l4 -9l4 9" />
                            <path d="M19.1 18h-6.2" />
                        </svg>
                    </div>
                    <input type="text"
                        class="w-full text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                        placeholder="Name" v-model="data.name">
                </div>
                <div class="relative ">

                    <label
                        class="flex justify-between items-center cursor-pointer border rounded-lg p-2.5 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">Show in Menu</span>
                        <input type="checkbox" v-model="data.is_hidden" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                    </label>
                </div>
                <div class="relative">
                    <div class="absolute left-2.5 top-2.5 pr-2.5 flex justify-center ">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000000"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-hierarchy-2 size-6 stroke-gray-400">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 3h4v4h-4z" />
                            <path d="M3 17h4v4h-4z" />
                            <path d="M17 17h4v4h-4z" />
                            <path d="M7 17l5 -4l5 4" />
                            <path d="M12 7l0 6" />
                        </svg>
                    </div>
                    <multiselect v-model="data.taxonomy" :options="taxonomyList" :searchable="false" :multiple="true"
                        :hide-selected="true" placeholder="Select taxonomy"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 text-sm ps-10 p-2.5">
                    </multiselect>
                </div>
                <div class="relative">
                    <div class="absolute left-2.5 top-2.5 pr-2.5 flex justify-center ">


                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-blocks size-6 stroke-gray-400">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 4a1 1 0 0 1 1 -1h5a1 1 0 0 1 1 1v5a1 1 0 0 1 -1 1h-5a1 1 0 0 1 -1 -1z" />
                            <path
                                d="M3 14h12a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h3a2 2 0 0 1 2 2v12" />
                        </svg>
                    </div>
                    <multiselect v-model="data.support" :options="supportList" :searchable="false" :multiple="true"
                        :hide-selected="true" placeholder="Select taxonomy"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-400 focus:border-blue-400 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 text-sm ps-10 p-2.5">
                    </multiselect>
                </div>
                <div class="relative ">

                    <label
                        class="flex justify-between items-center cursor-pointer border rounded-lg p-2.5 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">Hierarchical</span>
                        <input type="checkbox" v-model="data.hierarchical" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>

                    </label>

                </div>
                <div class="relative">
                    <label
                        class="flex justify-between items-center cursor-pointer border rounded-lg p-2.5 py-[.4rem] bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">Menu Icon</span>
                        <div class="shadow dark:shadow-gray-800 p-0.5 rounded" @click="open = true">
                            <Icon :iconName="resolvedIcon" />
                        </div>
                    </label>
                </div>
                <div class="relative">
                    <div class="absolute left-2.5 top-2.5 pr-2.5 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right size-6 stroke-gray-400">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 7l5 5l-5 5" />
                            <path d="M13 7l5 5l-5 5" />
                        </svg>
                    </div>
                    <input type="text"
                        class="w-full text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 "
                        placeholder="Slug" v-model="data.slug">
                </div>

            </div>

            <div class="flex justify-end mt-4">

                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex justify-center items-center">
                    <Icon iconName="IconDeviceFloppy" class="h-5 w-5 mr-2 " />
                    Save
                </button>
            </div>
        </form>
    </div>
</template>

<!-- TODO:move the styles to main css -->
<style>
.multiselect__tags-wrap {}

.multiselect__content {
    @apply mt-2
}

.multiselect__element {
    @apply px-2.5 py-0.5 mr-1 inline border rounded-full cursor-pointer;
}

.multiselect__input {
    @apply border-0
}

.multiselect__tag {
    @apply px-2.5 py-0.5 mr-1 bg-gray-200 dark:bg-gray-600 rounded-full inline-flex justify-between items-center;
}


.multiselect__tag-icon {
    @apply ps-1.5 cursor-pointer;
}

.multiselect__tag-icon::after {
    content: "×";
    color: #000000;
    font-size: 14px;
}
</style>