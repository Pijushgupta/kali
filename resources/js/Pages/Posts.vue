<script setup>

import Pagination from '@/sharead/Pagination.vue';
import {Link} from '@inertiajs/vue3'
const props = defineProps(
  {
    posts: Object,
    
  }
)

const links = props.posts.links;

</script>
<template>

<Pagination :links="links" class="flex flex-row justify-end mb-4"/>

<div class="relative overflow-y-scroll shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Author
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr v-for="post in posts.data" :key="post.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="flex flex-col">
                    {{ post.post_title }}
                    <Link v-bind:href="`/dashboard/edit?type=${post.post_type}&id=${post.id}`" class="text-sm font-normal">edit</Link>
                  </div>
                </th>
                <td class="px-6 py-4">
                  {{ post.created_at }}
                </td>
                <td class="px-6 py-4">
                  {{ post.author.name }}
                </td>
                
            </tr>
            
        </tbody>
    </table>
</div>



  <Pagination :links="links" class="flex flex-row justify-end my-4"/>

  




</template>