<div>
  <form @submit.prevent="createTask">
    @csrf
    <div class="space-y-4">
      <div class="space-y-3">
        <label for="title" class="block text-sm font-medium text-zinc-700">Title</label>
        <input type="text" name="title" wire:model="taskTitle" id="title" class="form-control-input" required>
      </div>

      <div class="space-y-3">
        <label for="description" class="block text-sm font-medium text-zinc-700">Description</label>
        <textarea name="description" id="description" wire:model="taskDescription" rows="3" class="block w-full rounded-md border-zinc-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 resize-none focus:outline-none border p-4" required></textarea>
      </div>

      <div class="space-y-3">
        <label for="deadline" class="block text-sm font-medium text-zinc-700">Deadline</label>
        <input type="datetime-local" name="deadline" id="deadline" wire:model="taskDeadline" class="w-full rounded-md border-zinc-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 focus:outline-none border" required>
      </div>

      <div class="space-y-3">
        <label class="block text-sm font-medium text-zinc-700">Status</label>
        <div class="flex items-center gap-4">
          <label class="flex flex-col items-center justify-center gap-2 border border-zinc-300 rounded-md p-3 w-32 text-center cursor-pointer hover:border-blue-500 focus-within:border-blue-500 focus-within:ring focus-within:ring-blue-300">
            <input type="radio" name="status" value="PENDING" wire:model="taskStatus" class="hidden peer" required checked>
            <span class="block w-5 h-5 bg-zinc-200 rounded-full peer-checked:bg-blue-500 peer-checked:ring peer-checked:ring-blue-300"></span>
            <span class="text-sm font-medium text-zinc-700 peer-checked:text-blue-500">Pending</span>
          </label>
          <label class="flex flex-col items-center justify-center gap-2 border border-zinc-300 rounded-md p-3 w-32 text-center cursor-pointer hover:border-blue-500 focus-within:border-blue-500 focus-within:ring focus-within:ring-blue-300">
            <input type="radio" name="status" value="IN_PROGRESS" wire:model="taskStatus" class="hidden peer" required>
            <span class="block w-5 h-5 bg-zinc-200 rounded-full peer-checked:bg-yellow-500 peer-checked:ring peer-checked:ring-yellow-300"></span>
            <span class="text-sm font-medium text-zinc-700 peer-checked:text-yellow-500">In Progress</span>
          </label>
          <label class="flex flex-col items-center justify-center gap-2 border border-zinc-300 rounded-md p-3 w-32 text-center cursor-pointer hover:border-blue-500 focus-within:border-blue-500 focus-within:ring focus-within:ring-blue-300">
            <input type="radio" name="status" value="COMPLETED" wire:model="taskStatus" class="hidden peer" required>
            <span class="block w-5 h-5 bg-zinc-200 rounded-full peer-checked:bg-green-500 peer-checked:ring peer-checked:ring-green-300"></span>
            <span class="text-sm font-medium text-zinc-700 peer-checked:text-green-500">Completed</span>
          </label>
        </div>
      </div>
    </div>

    <div class="mt-5 flex justify-end gap-3">
      <button type="button" wire:click="$reset" @click="open = false" class="px-4 py-2 text-sm font-medium text-zinc-700 bg-white border border-zinc-300 rounded-md hover:bg-zinc-50">
        Cancel
      </button>
      <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
        Create Task
      </button>
    </div>
  </form>
</div>
