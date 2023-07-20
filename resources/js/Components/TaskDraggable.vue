<script setup>
import { defineProps, ref } from 'vue';
import draggable from 'vuedraggable';
import Task from '@/Components/Task.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  completedTasks: Array,
  notCompletedTasks: Array,
});

const newCompletedTasks = ref(props.completedTasks);
const newNotCompletedTasks = ref(props.notCompletedTasks);

function onAdd(event) {
  const taskID = event.item.__draggable_context.element.id;
  router.put(`/task/${taskID}/completed`);
};

</script>

<template>
  <small>Not Completed Tasks</small>
  <draggable
    v-model="newNotCompletedTasks"
    group="tasks"
    item-key="id"
    :sort="false"
    @add="onAdd($event)"
    >
    <template #item="{ element }">
      <Task
        :id="element.id"
        :title="element.title"
        :created="element.created_at"
        :updated="element.updated_at"
      ></Task>
    </template>
  </draggable>

  <small>Completed Tasks</small>
  <draggable
    v-model="newCompletedTasks"
    item-key="id"
    group="tasks"
    :sort="false"
    @add="onAdd($event)"
    >
    <template #item="{ element }">
      <Task
        class="line-through border-2 mt-2 mb-2 p-2 bg-green-50 border-green-300 text-green-900"
        :id="element.id"
        :title="element.title"
        :created="element.created_at"
        :updated="element.updated_at"
      ></Task>
    </template>
  </draggable>

  <div v-if="newCompletedTasks.length == 0" id="drag-drop" class="bg-gray-200 max-w-2xl p-4 sm:p-6 lg:p-8 text-center">
    <small>Drag here to complete task</small>
  </div>
</template>
