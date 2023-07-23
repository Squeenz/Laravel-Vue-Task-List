<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

const props = defineProps({
    users: Array,
})
</script>

<template>
    <Head title="User Leaderboard" />
    <div class="min-h-screen bg-gray-100">
        <Navbar />
        <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <h1 class="border-b-2">User Leaderboard</h1>
            <div v-for="user in users" :key="user.id" class="border-2 mt-2 mb-2 p-2 bg-gray-50">
                <h5 class="border-b-2 border-gray-300 text-ellipsis overflow-hidden">{{ user.name }}</h5>
                <h6>Completed Tasks: {{ user.completed_tasks }}</h6>
                <h6>Uncompleted Tasks: {{ user.not_completed_tasks }}</h6>
                <h6>Total Tasks: {{ user.total_tasks }}</h6>
            </div>
        </div>
    </div>
</template>
