<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps(['task'])
</script>

<template>
    <Head title="Task" />
    <AuthenticatedLayout>
        <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <section class="pb-4">
                <h1 class="border-t-2 border-b-2 uppercase text-center text-xl">Title</h1>
                <p class="border-l-2 border-r-2 border-b-2 p-2">{{ props.task.title }}</p>
            </section>

            <section class="pb-4">
                <h1 class="border-t-2 border-b-2 uppercase text-center text-xl">Content</h1>
                <p class="border-l-2 border-r-2 border-b-2 p-2">{{ props.task.content }}</p>
            </section>

            <form>
                <div class="grid grid-rows-2 grid-flow-col gap-2 justify-center">
                    <section class="grid grid-rows-1 grid-flow-col gap-2">
                        <PrimaryButton>Edit</PrimaryButton>
                        <PrimaryButton class="bg-emerald-500 hover:bg-emerald-700 active:bg-emerald-700 focus:bg-emerald-700">Mark as completed</PrimaryButton>
                        <PrimaryButton class="bg-rose-500 hover:bg-rose-700 active:bg-rose-700 focus:bg-rose-700">Delete</PrimaryButton>
                    </section>
                    <Link :href="route('task.index')" class="text-center">Back</Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
