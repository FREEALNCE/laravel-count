<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1" style="padding: 10px">


                            <h2 class="text-center">Countdown Voucher Gift</h2>
                            <div id="undian"></div>
                            <div id="demo"></div>
                            <div>prize : <span id="kode"></span> </div>

                        
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="{{url('/')}}" style="color: blue" class="ml-1 underline">
                                Home
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="{{url('setting')}}" style="color: blue"  class="ml-1 underline">
                                Settings
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        &nbsp;&nbsp;Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
                    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeit/5.10.1/typeit.min.js"></script>

        <script>

        
// https://www.typeitjs.com/docs/vanilla#installation
//PAKAI YANG VERSI 5.10,1
// DIGUNAKAN UNTUK MENULIS HURUF SATU PERSATU
        function result(kode){

            var instance =   new TypeIt('#kode', {
                strings: kode,
                speed: 3000,
                autoStart: true,
                afterComplete: function(instance){
                    instance.destroy();
                    // FUNGSI CALLBACK UNTUK MELAKUKAN RESET
                    getApi()
                }
                });
            }
    
            //FUNGSI MENGAMBIL DATA SEKARANG
            function time_now(){
                var today = new Date();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

                return time;
            }

        </script>
        
        <script>

            //MELAKUKAN ASSIGN VALUE SAAT PERTAMA WEB DI RELEOD
            function assignValue(data){
                if (data.status_api == "success") {
                
                
                    if(data.waktu == 'siang'){

                        //ambil hasil result pas malam
                        let malam = data.kode_past_malam;

                        if(malam != null){
                            document.getElementById("kode").innerHTML = malam;
                        }else{

                            document.getElementById("kode").innerHTML = '_ _ _ _ _';
                        }

                    }else{
                        //ambil hasil result pas malam
                        let siang = data.kode_past_siang;

                        if(siang != null){
                            document.getElementById("kode").innerHTML = siang;
                        }else{

                            document.getElementById("kode").innerHTML = '_ _ _ _ _';
                        }
                    
                    }
                }else{
                    console.log("data active not found")
                }
            }

            // FUNGSI MENAMPILKAN DATA DARI RESULT DI ATAS
            async function delayResult(data){
                kode = data.kode;
                result(kode)

            }

            //FUNGSI MEMBUAT HISTORY KUPON PER HARI
            async function createHistory(data)
            {
            
                let url = window.location.href+'api/history/create/'+data.id;
                let response = await fetch(url);
                
                await delayResult(data);
            }

            //FUNGSI COUNTDOWN
            function countDown(data){
                date = data.tanggal
                time = data.time
                dateFormatted = date.toLocaleString('default',{day: 'numeric', month: 'long', year: 'numeric'});
                // Mengatur waktu akhir perhitungan mundur
                var countDownDate = new Date(date+' '+time).getTime();
                
                // Memperbarui hitungan mundur setiap 1 detik
                var x = setInterval(function() {
                
                // Untuk mendapatkan tanggal dan waktu hari ini
                var now = new Date().getTime();
                    
                // Temukan jarak antara sekarang dan tanggal hitung mundur
                var distance = countDownDate - now;
                    
                // Perhitungan waktu untuk hari, jam, menit dan detik
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                // Keluarkan hasil dalam elemen dengan id = "demo"
                // document.getElementById("demo").innerHTML = days + "&nbsp;:&nbsp;" + hours + "&nbsp;:&nbsp;"
                // + minutes + "&nbsp;:&nbsp;" + seconds;

                document.getElementById("demo").innerHTML ="count down = &nbsp;:&nbsp;" + hours + "&nbsp;:&nbsp;"
                + minutes + "&nbsp;:&nbsp;" + seconds;
                
                // Jika hitungan mundur selesai, tulis beberapa teks 
                if (distance < 0) {
                    clearInterval(x);

                    document.getElementById("demo").innerHTML = "Result "+data.waktu;

                    document.getElementById("kode").innerHTML = "";

                    createHistory(data);
                }
                }, 1000);
            }

        </script>

        {{-- //MENAMPILKAN WAKTU UNDIAN --}}
        <script>
            function waktuUndian(data){
                document.getElementById("undian").innerHTML ="waktu undian = &nbsp;&nbsp;" + data.tanggal + "&nbsp;,&nbsp;"
                + data.time;
            }
        </script>

        {{-- FUNGSI MELAKUKAN GET API DARI WEBSITE --}}
        <script>
            async function getApi(){
                let url = window.location.href+'api/all/'+time_now();

                let response = await fetch(url);

                let data = await response.json()

                if (data.status_api == "success") {
                    
                    //countdown data
                    countDown(data)

                    //waktu undian
                    waktuUndian(data)
                    
                    //memberikan value awal
                    assignValue(data)
                }
            }   

            getApi()

        </script>

    </body>
</html>
