<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('js/init-alpine.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <title>PT RCI | Status Breakdown</title>
</head>
<body>
<div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-24 overflow-hidden bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400 flex flex-col justify-center items-center">
          <a
            class="text-base text-center uppercase font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            BD <br> Harian
          </a>
          <ul class="mt-3">
            <li class="relative px-6 py-3">
              <a
                class="inline-flex rounded-lg p-1 flex-col items-center w-full text-sm font-semibold text-gray-800 duration-150 hover:text-white hover:bg-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="{{route('home.index')}}"
              >
                <svg
                  class="w-6 h-6"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="mt-1 text-xs text-center">Laporan Breakdown</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>

      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div class="flex flex-col flex-1 w-full">
        
        @yield('content')
        
        <footer class="block sm:hidden z-10 py-2 bg-stone-800 shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-center h-full px-6 mx-auto text-green-600 dark:text-green-300"
          >
            <!-- Mobile hamburger -->
            <a
              class="inline-flex rounded-lg p-2 flex-col items-center text-sm font-semibold text-white duration-150 hover:text-white hover:bg-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
              href="{{route('home.index')}}"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                ></path>
              </svg>
              <!-- <span class="mt-1 text-xs text-center">Laporan <br> Breakdown</span> -->
            </a>
          </div>
        </footer>
      </div>
    </div>
    @yield('javascripts')
  </body>
</body>
</html>