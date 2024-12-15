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
</template>