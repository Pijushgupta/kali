<script setup>
import {ref} from 'vue';
import Icon from '@/icons/Icon.vue';
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    post_types: Object 
});

const post_type = ref(props.post_types);
</script>
<template>
    <div class="h-[500px] flex flex-col justify-center items-center" v-if="post_type.length === 0 ">
        <span class="md:mb-8 text-xl font-thin ">No Post Type Found</span>
        <Link href="/dashboard/posttype/edit" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex justify-center items-center">
            <Icon iconName="IconSquareRoundedPlus2" class="h-5 w-5 mr-2" />
            Create Post Type
        </Link>
    </div>
    <div v-if="post_type.length !== 0">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                           Label
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(post_type,i) in post_types" :key="i" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ post_type.label }}
                        </th>
                        <td class="px-6 py-4">
                            {{ post_type.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ post_type.slug }}
                        </td>
                        
                        <td class="px-6 py-4">
                            <Link :href="`/dashboard/posttype/delete/${ post_type.id }`" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Delete</Link>
                            <Link :href="`/dashboard/posttype/edit/${ post_type.id }`" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                        </td>
                    </tr>          
                </tbody>
            </table>
        </div>
    </div>
</template>