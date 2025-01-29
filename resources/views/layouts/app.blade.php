@extends('layouts.base')

@section('layout')
  <div class="w-screen">
    <div class="flex h-screen">
      <!-- Sidebar -->
      <aside class="w-64 bg-white border-r flex flex-col">
        <div class="p-4 flex items-center space-x-2">
          <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8">
        </div>
        <nav class="flex flex-col p-4 space-y-2">
          <a href="#" class="flex items-center space-x-2 p-2 rounded hover:bg-blue-100">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 4C3.25 3.58579 3.58579 3.25 4 3.25H10C10.4142 3.25 10.75 3.58579 10.75 4V12C10.75 12.4142 10.4142 12.75 10 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12V4ZM4.75 4.75V11.25H9.25V4.75H4.75Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 16C3.25 15.5858 3.58579 15.25 4 15.25H10C10.4142 15.25 10.75 15.5858 10.75 16V20C10.75 20.4142 10.4142 20.75 10 20.75H4C3.58579 20.75 3.25 20.4142 3.25 20V16ZM4.75 16.75V19.25H9.25V16.75H4.75Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M13.25 12C13.25 11.5858 13.5858 11.25 14 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12V20C20.75 20.4142 20.4142 20.75 20 20.75H14C13.5858 20.75 13.25 20.4142 13.25 20V12ZM14.75 12.75V19.25H19.25V12.75H14.75Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M13.25 4C13.25 3.58579 13.5858 3.25 14 3.25H20C20.4142 3.25 20.75 3.58579 20.75 4V8C20.75 8.41421 20.4142 8.75 20 8.75H14C13.5858 8.75 13.25 8.41421 13.25 8V4ZM14.75 4.75V7.25H19.25V4.75H14.75Z" fill="#14367B"/>
              </svg>
            <span>Dashboard</span>
          </a>
          <a href="#" class="flex items-center space-x-2 p-2 rounded bg-blue-100">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.03033 3.96967C8.32322 4.26256 8.32322 4.73744 8.03033 5.03033L5.53033 7.53033C5.23744 7.82322 4.76256 7.82322 4.46967 7.53033L2.96967 6.03033C2.67678 5.73744 2.67678 5.26256 2.96967 4.96967C3.26256 4.67678 3.73744 4.67678 4.03033 4.96967L5 5.93934L6.96967 3.96967C7.26256 3.67678 7.73744 3.67678 8.03033 3.96967Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.03033 9.96967C8.32322 10.2626 8.32322 10.7374 8.03033 11.0303L5.53033 13.5303C5.23744 13.8232 4.76256 13.8232 4.46967 13.5303L2.96967 12.0303C2.67678 11.7374 2.67678 11.2626 2.96967 10.9697C3.26256 10.6768 3.73744 10.6768 4.03033 10.9697L5 11.9393L6.96967 9.96967C7.26256 9.67678 7.73744 9.67678 8.03033 9.96967Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.03033 15.9697C8.32322 16.2626 8.32322 16.7374 8.03033 17.0303L5.53033 19.5303C5.23744 19.8232 4.76256 19.8232 4.46967 19.5303L2.96967 18.0303C2.67678 17.7374 2.67678 17.2626 2.96967 16.9697C3.26256 16.6768 3.73744 16.6768 4.03033 16.9697L5 17.9393L6.96967 15.9697C7.26256 15.6768 7.73744 15.6768 8.03033 15.9697Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.25 6C10.25 5.58579 10.5858 5.25 11 5.25H20C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75H11C10.5858 6.75 10.25 6.41421 10.25 6Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.25 12C10.25 11.5858 10.5858 11.25 11 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H11C10.5858 12.75 10.25 12.4142 10.25 12Z" fill="#14367B"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.25 18C10.25 17.5858 10.5858 17.25 11 17.25H20C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75H11C10.5858 18.75 10.25 18.4142 10.25 18Z" fill="#14367B"/>
              </svg>
            <span>Tasks</span>
          </a>
        </nav>
        <div class="mt-auto p-4">
          <a href="{{ route("auth.logout") }}" class="w-full p-2 bg-red-100 text-red-500 rounded flex items-center justify-center space-x-2 hover:bg-red-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path></svg>
            <span>Log out</span>
          </a>
        </div>
      </aside>

      <!-- Main Content -->
      <div class="flex flex-col flex-1">
        <!-- Header -->
        <header class="bg-white border-b p-4 flex items-center justify-between">
          <div class="flex items-center space-x-4">
            <div class="relative">
              <input type="text" placeholder="Search" class="border border-gray-300 rounded px-4 py-2 w-96 pr-10 outline-none focus:outline-none" />
              <svg class="w-5 h-5 absolute right-3 top-1/2 -translate-y-1/2 text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 21L15.0001 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <button>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 3.75C11.6684 3.75 11.3505 3.8817 11.1161 4.11612C10.8816 4.35054 10.7499 4.66848 10.7499 5C10.7499 5.29002 10.5827 5.55405 10.3206 5.67802C9.29519 6.16287 8.42108 6.9176 7.79193 7.86133C7.16594 8.80031 6.80593 9.89117 6.74995 11.0181V14C6.74995 14.0301 6.74813 14.0602 6.74451 14.0901C6.65515 14.8284 6.39368 15.5354 5.98117 16.1542C5.95968 16.1864 5.93781 16.2183 5.91557 16.25H18.0843C18.0621 16.2183 18.0402 16.1864 18.0187 16.1542C17.6062 15.5354 17.3447 14.8284 17.2554 14.0901C17.2518 14.0602 17.2499 14.0301 17.2499 14V11.0181C17.194 9.89118 16.834 8.80031 16.208 7.86133C15.5788 6.9176 14.7047 6.16287 13.6793 5.67802C13.4172 5.55405 13.2499 5.29002 13.2499 5C13.2499 4.66848 13.1183 4.35054 12.8838 4.11612C12.6494 3.8817 12.3315 3.75 11.9999 3.75ZM10.0554 3.05546C10.5711 2.53973 11.2706 2.25 11.9999 2.25C12.7293 2.25 13.4288 2.53973 13.9445 3.05546C14.3452 3.45621 14.6095 3.96791 14.7075 4.51836C15.8121 5.11853 16.7563 5.97962 17.456 7.02927C18.2362 8.1995 18.6832 9.55995 18.7491 10.9648C18.7497 10.9765 18.7499 10.9883 18.7499 11V13.9524C18.8158 14.4422 18.9925 14.9106 19.2668 15.3221C19.549 15.7455 19.9268 16.0966 20.3695 16.3474C20.6659 16.5152 20.812 16.8617 20.7252 17.1911C20.6384 17.5205 20.3406 17.75 19.9999 17.75H3.99995C3.65933 17.75 3.36148 17.5205 3.2747 17.1911C3.18791 16.8617 3.33399 16.5152 3.63038 16.3474C4.07314 16.0966 4.45085 15.7455 4.7331 15.3221C5.00741 14.9106 5.1841 14.4422 5.24995 13.9524V11C5.24995 10.9883 5.25022 10.9765 5.25077 10.9648C5.31671 9.55995 5.76371 8.1995 6.54386 7.02927C7.24363 5.97962 8.18776 5.11853 9.29244 4.51836C9.39036 3.96791 9.65465 3.45621 10.0554 3.05546Z" fill="#3D3D3D"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9 16.25C9.41421 16.25 9.75 16.5858 9.75 17V18C9.75 18.5967 9.98705 19.169 10.409 19.591C10.831 20.0129 11.4033 20.25 12 20.25C12.5967 20.25 13.169 20.0129 13.591 19.591C14.0129 19.169 14.25 18.5967 14.25 18V17C14.25 16.5858 14.5858 16.25 15 16.25C15.4142 16.25 15.75 16.5858 15.75 17V18C15.75 18.9946 15.3549 19.9484 14.6517 20.6517C13.9484 21.3549 12.9946 21.75 12 21.75C11.0054 21.75 10.0516 21.3549 9.34835 20.6517C8.64509 19.9484 8.25 18.9946 8.25 18V17C8.25 16.5858 8.58579 16.25 9 16.25Z" fill="#3D3D3D"/>
              </svg>
            </button>
            <img src="https://github.com/Miguel-Leite.png" alt="User" class="w-10 h-10 rounded-full" />
          </div>
        </header>

        <div class="flex-1 overflow-y-auto">

          @yield('content')
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.data('kanban', () => ({
          dragStart(event, status) {
            event.dataTransfer.setData('text/plain', status);
          },
          drop(event, newStatus) {
            const oldStatus = event.dataTransfer.getData('text/plain');
            console.log(`Task moved from ${oldStatus} to ${newStatus}`);
            // Add Livewire or Axios logic to update backend
          },
        }));
      });
    </script>

    <style>
      .cursor-pointer:hover {
        transform: scale(1.02);
        transition: transform 0.2s;
      }
    </style>


  </div>
  @endsection
