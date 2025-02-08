<script setup>
import { usePage } from '@inertiajs/vue3';
import TreeItem from './TreeItem.vue';

const { props } = usePage();
const sidebarMenuItems = props.sidebarMenuItems || []; // Ensure default if undefined

</script>
<template>
   <aside id="logo-sidebar"
      class="fixed top-0 left-0 z-0   w-64 h-screen pl-5 pr-3  pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
      aria-label="Sidebar">
      
      <div class="h-full  pb-4 overflow-y-auto bg-white dark:bg-gray-800">
         <ul class="space-y-2 font-medium text-sm">

            <TreeItem v-for="(navItem, index) in sidebarMenuItems" :key="index" :item="navItem"/>
           <!-- <pre>{{ sidebarMenuItems }}</pre> -->

         </ul>
      </div>
      
   </aside>

</template>