<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    users: Array,
})

</script>

<template>
    <Head title="User Leaderboard" />
    <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <section v-if="!$page.props.auth.user" class="mb-2">
            <Link :href="route('login')"><PrimaryButton>Login</PrimaryButton></Link>
            <Link :href="route('register')" class="ml-2"><PrimaryButton>Register</PrimaryButton></Link>
        </section>

        <h1 class="border-b-2">User Leaderboard</h1>
        <div v-for="user in users" :key="user.id" class="m-5 p-2 bg-gray-200 rounded">
            <h5 class="border-b-2 border-gray-300">{{ user.name }}</h5>
            <h6>Completed Tasks: 0</h6>
            <h6>Uncompleted Tasks: 0</h6>
            <h6>Total Tasks: 0</h6>
        </div>

        <!-- <div class="m-5 p-2 bg-gray-200 rounded">
            <h5 class="border-b-2 border-gray-300">Username: devSqueenz</h5>
            <h6>Completed Tasks: 0</h6>
            <h6>Uncompleted Tasks: 0</h6>
            <h6>Total Tasks: 0</h6>
        </div> -->
    </div>
</template>
