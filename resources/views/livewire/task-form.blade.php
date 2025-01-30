<div>
  <form @submit.prevent="isEditing ? updateTask($event) : createTask($event)">
    @csrf
    <div class="space-y-4">
      <div class="space-y-3">
        <label for="title" class="block text-sm font-medium text-zinc-700">Title</label>
        <input type="text" name="title" x-model="currentTask ? currentTask.title : ''" wire:model="taskTitle" id="title" class="form-control-input" required>
      </div>

      <div class="space-y-3">
        <label for="description" class="block text-sm font-medium text-zinc-700">Description</label>
        <textarea name="description" x-model="currentTask ? currentTask.description : ''" id="description" wire:model="taskDescription" rows="3" class="block w-full rounded-md border-zinc-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 resize-none focus:outline-none border p-4" required></textarea>
      </div>

      <div class="space-y-3">
        <label for="deadline" class="block text-sm font-medium text-zinc-700">Deadline</label>
        <input type="datetime-local" name="deadline" x-model="currentTask ? currentTask.deadline : ''" id="deadline" wire:model="taskDeadline" class="w-full rounded-md border-zinc-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 focus:outline-none border" required>
      </div>
    </div>

    <div class="mt-5 flex justify-end gap-3">
      <button type="button" @click="open = false; resetForm();" class="px-4 py-2 text-sm font-medium text-zinc-700 bg-white border border-zinc-300 rounded-md hover:bg-zinc-50">
        Cancel
      </button>
      <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
        <span x-text="isEditing ? 'Update Task' : 'Create Task'"></span>
      </button>
    </div>
  </form>
</div>
