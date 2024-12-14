<script setup>
import { Link } from '@inertiajs/vue3';
import Icon from '@/icons/Icon.vue';

const props = defineProps({
    item:Object
})

function getToggleId(id){
    return 'dropdown-'+id;
}
</script>
<template>
    <li :class="item.isChild === true ? 'pl-2':''">
        <template v-if="item.child !== false">
            <button type="button"
                class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-50 hover:text-blue-600 dark:text-white dark:hover:bg-gray-700"
                aria-controls="dropdown-example" :data-collapse-toggle="getToggleId(item.id)">
                <template v-if="item.icon">
                    <Icon :iconName="item.icon" class="h-5 w-5"/>
                </template>
                <span class="flex-1 ms-2 text-left rtl:text-right whitespace-nowrap">{{ item.name }}</span>
                <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <ul :id="getToggleId(item.id)" class="hidden py-2 space-y-2">
                <TreeItem v-for="subItem in item.child" :key="subItem.id" :item="subItem"/>
            </ul>
        </template>
        <template v-else-if="item.child === false">
            <Link :href="item.link || '#'" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-50 hover:text-blue-600  dark:hover:bg-gray-700 group">
                <template v-if="item.icon">
                    <Icon :iconName="item.icon" class="h-5 w-5"/>
               </template>
               <span class="flex-1 ms-2 whitespace-nowrap">{{ item.name }}</span>
            </Link>
        </template>
       
    </li>
</template>