<script setup>
import { reactive,ref } from 'vue';
import Multiselect from 'vue-multiselect'

const props = defineProps({
    postType: Object
});
/**
 *  
 */
const data = reactive({
    label: props.postType?.label || null,
    name: props.postType?.name || null,
    is_hidden: props.postType?.is_hidden || null,
    taxonomy: props.postType?.taxonomy || null,
    support: props.postType?.support || null,
    hierarchical: props.postType?.hierarchical || null,
    menu_icon: props.postType?.menu_icon || null,
    slug: props.postType?.slug || null,

});
const options =  ['list', 'of', 'options'];
const value = ref(null);
const submit = () => {

}
</script>
<template>
    <div class="max-w-5xl mx-auto">
        <form @prevent.default>
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
                        placeholder="Label">
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
                        placeholder="Name">
                </div>
                <div class="relative">

                    <label class="flex justify-between items-center cursor-pointer">
                        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">Show in Menu</span>
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        
                    </label>

                </div>
                <div>
                    <multiselect 
                    v-model="value" 
                    :options="options" 
                    :searchable="false" 
                    :multiple="true"
                    :hide-selected="true"
                    placeholder="Select taxonomy"
                     class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 text-sm p-2"></multiselect>
                </div>
            </div>
        </form>
    </div>
</template>
<!-- <style src="vue-multiselect/dist/vue-multiselect.min.css"></style> -->
 <style>
.multiselect__tags-wrap{
   
}
.multiselect__content{
    @apply mt-2
}
.multiselect__element{
    @apply px-2.5 py-0.5 mr-1 inline border rounded-full ;
}
.multiselect__input{
    @apply border-0
}
.multiselect__tag{
    @apply px-2.5 py-0.5 mr-1 bg-gray-200 rounded-full inline-flex justify-between items-center;
}
.multiselect__tag-icon{
    @apply ps-1.5 cursor-pointer;
}
.multiselect__tag-icon::after {
  content: "×";
  color: #000000;
  font-size: 14px;
}

</style>