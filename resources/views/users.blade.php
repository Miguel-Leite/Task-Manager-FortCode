@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
  @if (session('success'))
    <div class="text-center text-green-600 bg-green-200 w-full px-4 py-2 rounded-xl my-3">
      <span>{{ session('success') }}</span>
    </div>
  @endif
  @if (session('error'))
    <div class="text-center text-red-600 bg-red-200 w-full px-4 py-2 rounded-xl my-3">
      <span>{{ session('error') }}</span>
    </div>
  @endif

  <div class="flex items-center justify-between mb-5">
    <h1 class="text-2xl font-bold mb-6">Users</h1>
    <button data-hasPermission="{{ $permissions['create_users'] }}" class="button-primary data-[hasPermission=0]:hidden">
      <span>New user</span>
    </button>
  </div>

  <div class="bg-white rounded-lg overflow-hidden w-full">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cargo</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($users as $user)
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->roles[0]->name === "super-admin" ? "Administrador" : "Funcionario" }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              <div class="flex items-center justify-end gap-3">
                <a class="p-2 rounded bg-zinc-200 text-zinc-600 inline-block" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                </a>
                <button
                  class="p-2 rounded bg-red-600 text-white inline-block open-delete-modal cursor-pointer"
                  data-user-id="{{ $user->id }}"
                  data-user-name="{{ $user->name }}"
                  {{ auth()->guard()->user()->id === $user->id ? 'disabled' : '' }}>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-xl font-bold mb-4">Delete User</h2>
    <p>Are you sure you want to delete <span id="userName" class="font-semibold"></span>?</p>
    <div class="flex justify-end gap-3 mt-6">
      <button id="cancelButton" class="py-2 px-4 rounded bg-zinc-200 text-zinc-600">Cancel</button>
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <button type="submit" class="py-2 px-4 rounded bg-red-600 text-white">Delete</button>
      </form>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.open-delete-modal').forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.getElementById('deleteModal');
      const userName = button.getAttribute('data-user-name');
      const userId = button.getAttribute('data-user-id');
      const deleteForm = document.getElementById('deleteForm');

      document.getElementById('userName').textContent = userName;
      deleteForm.action = `/users/${userId}`;

      modal.classList.remove('hidden');
    });
  });

  document.getElementById('cancelButton').addEventListener('click', () => {
    document.getElementById('deleteModal').classList.add('hidden');
  });
</script>
@endsection
