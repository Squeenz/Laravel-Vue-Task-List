<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    title: '',
    content: ''
});

</script>

<template>
    <Head title="Create Task" />
    <AuthenticatedLayout>
        <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <h1>Create Task</h1>
            <form @submit.prevent="form.post(route('task.store')), { onSuccess: () => form.reset() }">
                <label for="title">Title: </label>
                <InputError :message="form.errors.title"/>
                <input v-model="form.title" name="title" type="text" class="w-full rounded mt-4 mb-4"/>

                <label for="title">Content: </label>
                <InputError :message="form.errors.content"/>
                <textarea v-model="form.content" name="content" type="text" class="w-full rounded mt-4 mb-4"></textarea>

                <PrimaryButton>Create</PrimaryButton>
                <a :href="route('task.index')" class="ml-4">Cancel</a>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
