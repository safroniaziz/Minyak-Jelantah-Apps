
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minyak Jelantah Apps</title>
        <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}">

     <!-- stylesheets tailwind -->
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="{{ asset('assets/output.css') }}" />
     <!-- alpine js -->
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
     <!-- tailwindcss flag-icon  -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet" />

     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
     <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

     <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
     <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
     <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
         integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />


     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>

    <script>
        window.onscroll = function () {
        scrollFunction();
        navMobileHome();
        };
        </script>


</head>

<body
    class=" font-[Poppins] antialiased leading-normal tracking-wide 2xl:text-xl bg-white pattern2 text-slate-900">
    <div id="home"></div>

    <!-- Preloader Start -->
    <div x-data="{ show: false }" x-transition:enter="transition duration-700" style="z-index: 99;"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        class="bg-white rounded p-4" x-show="show">
        <!-- Preloader Start -->
        <div id="loader-wrapper">
            <div id="loader-logo">
                <div id="loader"></div>
            </div>
        </div>
        <!-- Preloader Start -->
    </div>

    <!-- Preloader Start -->


    <!-- navbar  -->
    <nav x-data="{isOpen: false }" class="fixed top-0   z-50 w-full     ">
        <!-- Top Bar -->
        <div id="top-bar" class="w-full     bg-gray-900 duration-500">
            <div class="flex   w-full     text-gray-300 space-x-4 text-sm py-2">
                <marquee behavior="" direction="">
                    <p>
                        @foreach ($kontaks as $kontak)
                            {{ $kontak->judul.' : '.$kontak->kontak }},,&nbsp;
                        @endforeach
                    </p>
                </marquee>

            </div>
        </div>

        <div id="navbar" class="px-6 py-5 mx-auto duration-300 bg-[#308849]   ">
            <div class="lg:flex lg:items-center lg:justify-between  ">
                <div class="flex items-center justify-between">
                    <!-- logo -->
                    <a href="{{ route('welcome') }}" class="flex items-center text-black   mx-4 md:ml-6">
                        <img src="{{ asset('assets/logo.png') }}" style="height: 45px">

                        <div class="ml-3  text-white">
                            <!-- update  -->

                            <strong class="text-xl md:text-3xl font-bold  text-white   uppercase">MINYAK JELANTAH</strong>
                            <p class="text-sm md:text-[16px]   text-yellow-300      uppercase -mt-2
                                relative">
                                APPS</p>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-100 "
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>
                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-[#308849]   md:bg-none menu-navbar text-white lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto
                    lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center " id="list-menu">
                    <div class="flex flex-col -mx-6 lg:flex-row lg:items-center lg:mx-8 ">
                        <a href="#home"
                            class="px-3 py-2 mx-2 mt-2  text-gray-100 text-[14px] transition-colors duration-300 transform rounded-md lg:mt-0 hover:text-[#EAB308] ">Home</a>
                        <a href="#about"
                            class="px-3 py-2 mx-2 mt-2  text-gray-100 text-[14px] transition-colors
                            duration-300 transform rounded-md lg:mt-0 hover:text-[#EAB308] ">Tentang Aplikasi</a>
                        <a href="#informasi"
                            class="px-3 py-2 mx-2 mt-2  text-gray-100 text-[14px] transition-colors
                            duration-300 transform rounded-md lg:mt-0 hover:text-[#EAB308] ">Informasi & Pengumuman</a>
                        <a href="#katalog"
                            class="px-3 py-2 mx-2 mt-2  text-gray-100 text-[14px] transition-colors duration-300 transform rounded-md lg:mt-0 hover:text-[#EAB308] ">Katalog</a>
                           <a href="{{ route('login') }}" class=" py-2 mx-4 mt-2 text-white text-[14px] transition-colors duration-300 transform
                            lg:mt-0 bg-gradient-to-r from-orange-500 to-yellow-500 border border-white rounded-lg
                            hover:from-orange-600 hover:to-yellow-600 px-5 ">Login</a>
                    </div>
                    <!-- <div class="flex items-center mt-4 mr-8 lg:mt-0">
                        <div x-data="{ isOpen: false }" class="relative inline-block ">
                            <button @click="isOpen = !isOpen" type="button" class="flex items-center focus:outline-none"
                                aria-label="toggle profile dropdown">
                                <img class="w-8 h-8 rounded-full ring-2 mr-3 ring-gray-300  "
                                    src="https://www.gravatar.com/avatar/{{ md5(Session::get('mhsNama')) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', Session::get('mhsNama')) !!}/128"
                                    alt="Bordegreen avatar">
                                <h3 class="mx-2  text-gray-100 lg:hidden">
                                    budi
                                </h3>
                            </button>
                            <div x-show="isOpen" @click.away="isOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-0 z-20 py-2 mt-2 -mr-16 bg-white    rounded-md shadow-xl lg:w-72 lg:mr-0 ">
                                <a href="#"
                                    class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform hover:bg-gray-100  ">
                                    <img class="w-8 h-8 rounded-full ring-2 ring-gray-300  "
                                        src="https://www.gravatar.com/avatar/budi?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/budi/128"
                                        alt="Bordegreen avatar">
                                    <div class="ml-2">
                                        <h1 class="text-sm font-semibold   ">
                                            Budi
                                        </h1>
                                        <p class="text-sm text-gray-500  ">
                                            Budi@gmail.com</p>
                                    </div>
                                </a>
                                <hr class="border-gray-200 ">
                                <a href="dashboard.html"
                                    class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100  ">
                                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z"
                                            fill="currentColor"></path>
                                    </svg>

                                    <span class="mx-1">
                                        Dashboard
                                    </span>
                                </a>
                                <hr class="border-gray-200 ">
                                <a href=" "
                                    class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100   ">
                                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 21H10C8.89543 21 8 20.1046 8 19V15H10V19H19V5H10V9H8V5C8 3.89543 8.89543 3 10 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM12 16V13H3V11H12V8L17 12L12 16Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="mx-1">
                                        Keluar
                                    </span>
                                </a>
                            </div>
                        </div>


                    </div> -->
                </div>
            </div>
        </div>

    </nav>
    <!-- end navbar -->

    <!-- slider -->
    <section id="home" class="bg-gradient-to-b from-[#308849] from-60%">

        <div
            class="  text-center pt-32   ">


            <div
                class="mx-auto container   px-4 sm:px-6 lg:px-8 relative bg-transparent   flex flex-wrap flex-col md:flex-row items-center  ">
                <!--Left Col-->
                <div data-aos="zoom-in-left" class="mt-16 w-full md:w-1/2 justify-center items-start md:px-5 text-center md:text-right
                      px-4   z-30">
                        <lottie-player data-aos="fade-right" src="{{ asset('assets/animation-login.json') }}"
                    style="filter: drop-shadow(10px 10px 0px #4a0702)" background="transparent" speed="1"
                    class=" mx-auto" loop autoplay></lottie-player>

                </div>
                <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="   w-full  md:w-1/2   justify-center items-center md:px-5 text-center md:text-left
                      px-4   z-30">
                    <!-- <img src="/src/Head-UNIB-3.png" class="w-2/3 mx-auto md:ml-auto md:mr-0    mb-5"> -->

                    <p class="mt-2 text-3xl  uppercase lg:text-4xl   text-white text-center md:text-left font-[arial] font-extrabold
                            ">
                        Minyak Jelantah Apps
                    </p>
                    <p class=" my-2 leading-7 text-sm mb-8   text-white
                            text-center md:text-left ">
                        <!-- Selamat Datang di <span class="text-yellow-200">PRisMa</span>. -->
                        Minyak Jelantah Apps diciptakan untuk menyederhanakan proses pendataan dan pengumpulan minyak jelantah dari mitra, mempromosikan praktik ramah lingkungan dalam pengelolaan limbah masyarakat.

                    </p>
                    <a href="{{ route('login') }}"
                        class=" h-full inline-block text-center   mt-1 w-full md:max-w-[180px]
                                hover:scale-[99%] focus:scale-95
                                font-bold tracking-widest text-white bg-gradient-to-r from-orange-500 to-yellow-500
                                border border-white rounded-lg
                                hover:from-orange-600 hover:to-yellow-600 px-3 py-2
                              text-sm    transition-all duration-500 focus:shadow-[-2px_2px_10px_0px_#eab308]
                                ">Login</a>


                </div>

            </div>

        </div>
    </section>
    <!-- end slider -->

    <!-- Tentang E-Voting Pemira -->
    <section id="about">
        <div class="mx-auto container px-4 sm:px-6 lg:px-8 section-heading pt-32 pb-2  ">
            <h2 data-aos="fade-down" class="mb-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#308849]   "
                style="text-shadow:5px 5px 5px #38383863; text-transform:uppercase">
                Tentang Minyak Jelantah Apps</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                <div data-aos="fade-right" class="text-[14px] leading-7">
                     <p   class="text-[14px] leading-7 mb-5 "><b>Minyak Jelantah</b> adalah minyak bekas yang dihasilkan dari proses memasak makanan, seperti digunakan untuk menggoreng. Ini umumnya terdiri dari lemak dan minyak yang dilepaskan dari daging, ikan, atau produk nabati saat dimasak. Minyak jelantah dapat menjadi masalah lingkungan jika dibuang secara tidak benar, karena dapat mencemari air dan mengganggu kehidupan akuatik serta menyebabkan sumbatan saluran pembuangan. Sebagai hasilnya, pengelolaan yang tepat diperlukan untuk menghindari dampak negatifnya.
                     </p>
                    <strong  >Apa itu Minyak Jelantah Apps?</strong>
                    <p   class="mb-5">Minyak Jelantah Apps adalah aplikasi yang dirancang untuk memfasilitasi pendataan dan pengumpulan minyak bekas dari mitra. Dengan fitur-fitur seperti informasi terkini dan pengumuman, serta katalog produk terkait, aplikasi ini mempromosikan praktik pengelolaan limbah yang ramah lingkungan. Dengan demikian, membantu dalam meminimalkan dampak negatif yang ditimbulkan oleh pembuangan minyak jelantah yang tidak tepat.
                    </p>
                </div>
                <div>
                    <lottie-player data-aos="fade-right" src="{{ asset('assets/information.json') }}"
                    style="filter: drop-shadow(10px 10px 0px #4a0702)" background="transparent" speed="1"
                    class=" mx-auto" loop autoplay></lottie-player>
                </div>
            </div>
        </div>


    </section>
    <!-- end Tentang E-Voting Pemira -->

    <!-- Tata Cara Pimilihan -->
    <section id="informasi" class=" py-32 lg:py-20 pt-10 px-3 pb-8 ">
        <section class=" bg-[#ffffff]">
            <div class="container flex flex-col items-center px-4   mx-auto  section-heading py-12  ">
                <h2 data-aos="fade-down"
                    class="mb-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#308849]   "
                    style="text-shadow:5px 5px 5px #38383863;">
                    INFORMASI & PENGUMUMAN</h2>

                <p data-aos="fade-down"
                    class="  mt-2   text-sm text-gray-700   text-justify leading-8">
                    Jelajahi informasi terkini tentang manfaat pengumpulan minyak jelantah dan perubahan terbaru dalam layanan kami melalui menu Informasi dan Pengumuman
                </p>

                <section class="flex flex-col justify-center antialiased  my-16 text-gray-800  ">
                    <div x-data class=" container mx-auto p-4 sm:px-6 h-full">
                        <!-- berita -->
                        <template x-for="1 in 4">
                            <article class="max-w-sm mx-auto mb-8 mt-1 md:max-w-none grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10 xl:gap-8
                            items-center ">
                                <a class="relative block group hover:rounded-xl     duration-700 transform hover:shadow-lg"
                                    href="#0">

                                    <figure
                                        class="relative h-0 pb-[56.25%] md:pb-[75%] lg:pb-[56.25%] overflow-hidden transform
                                        transition duration-700 ease-out rounded-md shadow-xl shadow-gray-500
                                        group-hover:shadow-green-700">
                                        <img class="absolute inset-0 w-full h-full object-cover transform hover:scale-110 transition duration-700 ease-out "
                                            src="https://www.creativefabrica.com/wp-content/uploads/2023/05/11/Modern-colourful-abstract-background-Graphics-69439498-1.jpg"
                                              alt="img">
                                    </figure>
                                </a>
                                <div class="col-span-1 lg:col-span-2">
                                    <header>
                                        <h3 class="text-xl   font-bold leading-tight mb-2">
                                            <a class="hover:text-green-500  text-green-700 transition duration-150 ease-in-out"
                                                href="detail-berita.html">Designing a
                                                functional workflow at home.</a>
                                        </h3>
                                    </header>
                                    <p
                                        class="md:text-sm text-xs  text-gray-600   line-clamp-3 md:leading-7 leading-5 text-justify  break-all ">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aliquid
                                        exercitationem
                                        harum nam qui earum nesciunt esse debitis praesentium veritatis nihil voluptatum,
                                        laudantium
                                        modi molestias blanditiis cumque corporis odio impedit. Lorem ipsum dolor sit amet
                                        consectetur, adipisicing elit. Culpa esse dolor, saepe obcaecati, odio magni alias
                                        libero
                                        quia, nihil in sit perspiciatis illo adipisci quo voluptatem. Vero expedita ex ducimus?
                                    </p>
                                        <a href="detail-berita.html"
                                            class="md:text-sm text-xs  text-green-600  hover:text-green-500">Selengkapnya...</a>

                                    <footer class="flex items-center mt-4">
                                        <a href="#0">
                                            <img class="rounded-full w-7 h-7 flex-shrink-0 mr-2"
                                                src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png"
                                                alt="Author 04">
                                        </a>
                                        <div>
                                            <a class="md:text-sm text-xs text-gray-800 hover:text-green-700 transition duration-150 ease-in-out"
                                                href="#0">Admin</a>
                                            <span class="text-gray-700"> - </span>
                                            <span class="text-gray-500">15 Februari 2024</span>
                                        </div>
                                    </footer>
                                </div>
                            </article>
                        </template>

                    </div>
                </section>


            </div>
        </section>

    </section>
    <!-- end Tata Cara Pimilihan -->

    <!-- Tata Cara Pimilihan -->
    <section id="katalog" class=" pb-32 lg:pb-20 pt-4   pb-3">
        <section class=" bg-[#ffffff]">
            <div class="container flex flex-col items-center px-4   mx-auto  section-heading py-12  ">
                <h2 data-aos="fade-down"
                    class="mb-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#308849]   "
                    style="text-shadow:5px 5px 5px #38383863;">
                    KATALOG</h2>

                <p data-aos="fade-down"
                    class="  mt-2   text-sm text-gray-700   text-justify leading-8">
                    Temukan beragam produk dan layanan terkait pengelolaan minyak jelantah serta panduan praktis melalui Katalog kami.
                </p>

                <section class="flex flex-col justify-center antialiased  my-16 text-gray-800  ">
                    <div x-data class=" container mx-auto p-4 sm:px-6 h-full">
                        <!-- berita -->
                        <template x-for="1 in 4">
                            <article class="max-w-sm mx-auto mb-8 mt-1 md:max-w-none grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10 xl:gap-8
                            items-center ">
                                <a class="relative block group hover:rounded-xl     duration-700 transform hover:shadow-lg"
                                    href="#0">

                                    <figure
                                        class="relative h-0 pb-[56.25%] md:pb-[75%] lg:pb-[56.25%] overflow-hidden transform
                                        transition duration-700 ease-out rounded-md shadow-xl shadow-gray-500
                                        group-hover:shadow-green-700">
                                        <img class="absolute inset-0 w-full h-full object-cover transform hover:scale-110 transition duration-700 ease-out "
                                            src="https://www.creativefabrica.com/wp-content/uploads/2023/05/11/Modern-colourful-abstract-background-Graphics-69439498-1.jpg"
                                              alt="img">
                                    </figure>
                                </a>
                                <div class="col-span-1 lg:col-span-2">
                                    <header>
                                        <h3 class="text-xl   font-bold leading-tight mb-2">
                                            <a class="hover:text-green-500  text-green-700 transition duration-150 ease-in-out"
                                                href="detail-berita.html">Designing a
                                                functional workflow at home.</a>
                                        </h3>
                                    </header>
                                    <p
                                        class="md:text-sm text-xs  text-gray-600   line-clamp-3 md:leading-7 leading-5 text-justify  break-all ">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aliquid
                                        exercitationem
                                        harum nam qui earum nesciunt esse debitis praesentium veritatis nihil voluptatum,
                                        laudantium
                                        modi molestias blanditiis cumque corporis odio impedit. Lorem ipsum dolor sit amet
                                        consectetur, adipisicing elit. Culpa esse dolor, saepe obcaecati, odio magni alias
                                        libero
                                        quia, nihil in sit perspiciatis illo adipisci quo voluptatem. Vero expedita ex ducimus?
                                    </p>
                                        <a href="detail-berita.html"
                                            class="md:text-sm text-xs  text-green-600  hover:text-green-500">Selengkapnya...</a>

                                    <footer class="flex items-center mt-4">
                                        <a href="#0">
                                            <img class="rounded-full w-7 h-7 flex-shrink-0 mr-2"
                                                src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png"
                                                alt="Author 04">
                                        </a>
                                        <div>
                                            <a class="md:text-sm text-xs text-gray-800 hover:text-green-700 transition duration-150 ease-in-out"
                                                href="#0">Admin</a>
                                            <span class="text-gray-700"> - </span>
                                            <span class="text-gray-500">15 Februari 2024</span>
                                        </div>
                                    </footer>
                                </div>
                            </article>
                        </template>

                    </div>
                </section>


            </div>
        </section>

    </section>
    <!-- end Tata Cara Pimilihan -->

    <div class="relative">
        <div class="slider-svg-b tran-svg absolute z-10">
            <svg data-name="Layer 1" class="svg4 duration-300 transform fill-white opacity-60"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill"></path>
            </svg>
        </div>

        <div class="slider-svg-b tran-svg absolute -mt-2 z-10">
            <svg data-name="Layer 1" class="svg6 duration-300 transform fill-gray-100"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

     <!-- Footer  -->

     <footer class="relative pt-2 bg-[#308849]">
        <div
            class="mx-auto container px-5 py-20 pt-8 pb-8    flex items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
            <div class="lg:w-full md:w-full  w-full flex-shrink-0 md:mx-0 mx-auto text-left">
                <a href="{{ route('welcome') }}" class="flex items-center text-black">
                    <img src="{{ asset('assets/logo.png') }}" class="md:w-12 md:h-14 w-10 h-12" />

                    <div class="ml-3 text-slate-100 ">
                        <strong class="text-2xl   font-extrabold  text-sh uppercase font-[arial]">a</strong>
                        <p class="text-[13px] md:text-[15px]   uppercase -mt-2 relative">
a
                        </p>
                    </div>
                </a>
                <a class="flex my-3 group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="fill-gray-300 group-hover:fill-orange-200 w-5 h-5 mr-3" viewBox="0 0 16 16" id="map">
                        <path
                            d="M8 0C5.2 0 3 2.2 3 5s4 11 5 11 5-8.2 5-11-2.2-5-5-5zm0 8C6.3 8 5 6.7 5 5s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z">
                        </path>
                    </svg>

                    <span
                        class="text-sm text-white group-hover:text-orange-200 duration-300 transform break-normal max-w-xl">

                    </span>
                </a>

                <a class="flex my-3 group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="fill-gray-300 group-hover:fill-orange-200 w-5 h-5 mr-3" fill="currentColor"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>

                    <span
                        class="text-sm text-white group-hover:text-orange-200 duration-300 transform break-normal"></span>
                </a>

                <a class="flex my-3 group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="fill-gray-300 group-hover:fill-orange-200 w-5 h-5 mr-3" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                    <span
                        class="text-sm text-white group-hover:text-orange-200 duration-300 transform break-normal"></span>
                </a>
            </div>
        </div>

        <div class="px-12 mx-auto py-4 flex flex-wrap flex-col sm:flex-row bg-green-800">
            <p class="text-white mx-auto text-sm text-center sm:text-left">
                Copyright&copy; 2024 |
                <a href="#" class="text-orange-300 font-bold">Minyak Jelantah Apps</a>. All
                rights reserved.
            </p>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- back to top  -->
    <div class="" x-data="{scrollBackTop: false}" x-cloak>
        <svg x-show="scrollBackTop" @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false"
            aria-label="Back to top" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            class="bi bi-arrow-up-circle-fill fixed bottom-0 right-0 mx-3 my-10 w-8 fill-green-500 shadow-lg cursor-pointer hover:fill-green-400 bg-white rounded-full"
            viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
        </svg>
    </div>

</body>

<!-- script -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/scripts.js') }}"></script>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>


</html>
