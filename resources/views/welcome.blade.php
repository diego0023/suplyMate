<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/heroicons@1.0.3/dist/styles.css">
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-[#F5F5F5]">
        <section data-bg-class="bg-sky-200">
            <div class="max-w-3xl mx-auto">
                <div class="flex items-center justify-center pt-12">
                    <a href="{{ route('product') }}" class="bg-[#3FC1C9]/50 rounded-2xl shadow shadow-sky-900/10 p-6 w-[200px] hover:bg-[#3FC1C9] cursor-pointer flex items-center hover:text-[#FC5185]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                        <p class=" text-2xl font-bold text-gray-900 pl-2">Productos</p>
                    </a>
                    <div class="px-4 text-[#FC5185] text-4xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                    <a href="{{ route('productTree') }}" class="bg-[#3FC1C9]/50 rounded-2xl shadow shadow-sky-900/10 p-6 w-[200px] hover:bg-[#3FC1C9] cursor-pointer flex items-center justify-center hover:text-[#FC5185]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                        </svg>
                        <p class=" text-2xl font-bold text-gray-900 pl-2">Árbol</p>
                    </a>
                    <div class="px-4 text-[#FC5185] text-4xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                    <a href="{{ route('productBom') }}" class="bg-[#3FC1C9]/50 rounded-2xl shadow shadow-sky-900/10 p-6 w-[200px] hover:bg-[#3FC1C9] cursor-pointer flex items-center justify-center hover:text-[#FC5185]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                        <p class=" text-2xl font-bold text-gray-900 pl-2">BOM</p>
                    </a>
                </div>
                <div class="py-6 md:py-10">
                    <div class="max-w-sm mx-auto sm:max-w-none grid sm:grid-cols-2 gap-6">

                        <article class="bg-white/50 rounded-2xl shadow shadow-sky-900/10 p-6">
                            <div class="space-y-10">
                                <div>
                                    <div class="text-[#FC5185] mb-3">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" aria-label="1">
                                            <path d="M6.466 17.537c-.31-.308-.466-.74-.466-1.295 0-.324.045-.67.135-1.04.09-.37.204-.733.344-1.088.139-.354.282-.686.429-.994a20.435 20.435 0 0 1 .417-.833.269.269 0 0 1 .05-.07c.048-.092.118-.246.208-.462.09-.216.196-.474.319-.775l.417-1.017c.155-.378.323-.768.503-1.168.213-.51.434-1.026.663-1.55.229-.524.441-1.01.638-1.457.196-.447.364-.833.503-1.157.139-.324.233-.54.282-.647.098-.17.151-.282.16-.336a.903.903 0 0 0 .012-.127c.065-.247.147-.516.245-.81.098-.292.217-.566.356-.82.139-.255.303-.467.49-.637A.942.942 0 0 1 12.823 1c.18 0 .372.058.577.173.204.116.405.313.601.59l-.05-.07c0 .016-.08.251-.244.706-.164.455-.385 1.057-.663 1.804a686.082 686.082 0 0 1-2.074 5.494 530.456 530.456 0 0 1-2.171 5.562c-.311.779-.577 1.415-.798 1.908-.22.494-.364.771-.43.833a4.054 4.054 0 0 1-.576-.15c-.27-.085-.446-.19-.528-.313Z" />
                                        </svg>
                                    </div>
                                    <h2 class="text-2xl font-extrabold text-[#364F6B] mb-2">MRP</h2>
                                    <p class="text-slate-500">Proceso que permite planificar los materiales y gestionar los stocks en función de las necesidades de la empresa con el objetivo de mejorar la producción o distribución de su productos o servicios.</p>
                                </div>
                                <img class="mx-auto" src="https://cdn.devdojo.com/images/december2020/productivity.png"width="324" height="168" alt="Illustration 1a">
                            </div>
                        </article>
                        <article class="bg-white/50 rounded-2xl shadow shadow-sky-900/10 p-6">
                            <div class="space-y-10">
                                <div>
                                    <div class="text-[#FC5185] mb-3">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" aria-label="2">
                                            <path d="M2.532 17.41c-.202-.132-.342-.276-.418-.432A1.135 1.135 0 0 1 2 16.474c0-.213.042-.394.127-.542.084-.147.186-.303.304-.467.338-.41.689-.813 1.052-1.207.364-.393.723-.779 1.078-1.156A72.729 72.729 0 0 0 7.756 9.36a23.578 23.578 0 0 0 2.688-4.21c.169-.41.253-.705.253-.885 0-.148-.11-.222-.33-.222a2.8 2.8 0 0 0-.57.074c-.228.05-.465.115-.71.197-.245.082-.499.172-.76.27a12.69 12.69 0 0 0-.723.296c-.575.23-1.074.414-1.496.554-.423.14-.714.197-.875.172-.16-.024-.178-.16-.05-.406.126-.246.451-.632.975-1.157.27-.295.596-.566.977-.812a9.69 9.69 0 0 1 1.179-.653 6.449 6.449 0 0 1 1.23-.43A5.009 5.009 0 0 1 10.697 2c.693 0 1.277.168 1.75.505.473.336.71.882.71 1.637 0 .541-.178 1.214-.533 2.018-.44.935-.98 1.801-1.622 2.597a75.418 75.418 0 0 1-1.978 2.35c-.609.69-1.192 1.367-1.75 2.031a11.138 11.138 0 0 0-1.42 2.154c.423-.065.951-.197 1.585-.394a57.411 57.411 0 0 0 2.067-.689c.54-.197 1.094-.39 1.66-.578a31.5 31.5 0 0 1 1.661-.505c.541-.148 1.065-.267 1.572-.357.507-.09.98-.135 1.42-.135.49 0 .917.07 1.28.21.364.139.656.364.876.676.017.082.025.193.025.332 0 .14-.013.283-.038.431a4.26 4.26 0 0 1-.089.406.925.925 0 0 1-.101.259 5.81 5.81 0 0 0-1.42-.025c-.507.05-1.048.144-1.623.283-.575.14-1.166.312-1.775.517-.609.205-1.217.414-1.826.628a65.997 65.997 0 0 1-3.46 1.144c-1.125.337-2.143.505-3.056.505-.39 0-.761-.045-1.116-.135a2.727 2.727 0 0 1-.964-.456Z" />
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-extrabold text-[#364F6B] mb-2">Asegure la disponibilidad </h2>
                                    <p class="text-slate-500">La demanda de los productos no depende única y exclusivamente de los que se encuentran preparados en almacén.</p>
                                </div>
                                <img class="mx-auto" src="https://cdn.devdojo.com/images/december2020/settings.png" width="324" height="168" alt="Illustration 2a">
                            </div>
                        </article>
                        <article class="sm:col-span-2 bg-white/50 rounded-2xl shadow shadow-sky-900/10 px-6 py-16">
                            <div class="space-y-10 md:flex items-center justify-between md:space-y-0 md:space-x-8">
                                <div>
                                    <div class="text-[#FC5185] mb-3">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" aria-label="3">
                                            <path d="M4.096 18.954c-.083-.031-.203-.116-.361-.256a1.853 1.853 0 0 1-.311-.324l.025.023a.27.27 0 0 0-.05-.07.27.27 0 0 1-.05-.07l.05.047a3.425 3.425 0 0 1-.274-.394.791.791 0 0 1-.125-.406c0-.131.05-.251.15-.36.1-.108.29-.2.573-.278.282-.077.577-.092.884-.046.307.046.619.108.935.185.215.031.431.07.647.116.216.047.416.062.598.047.316-.031.764-.155 1.346-.371a18.55 18.55 0 0 0 1.881-.835c.673-.34 1.358-.723 2.056-1.148a19.885 19.885 0 0 0 1.906-1.31c.573-.449 1.038-.89 1.395-1.323.357-.432.536-.827.536-1.182 0-.279-.233-.51-.698-.696l.1.046c-.349-.062-.839-.015-1.47.14-.631.154-1.296.324-1.993.51-.648.185-1.28.351-1.894.498-.615.147-1.138.22-1.57.22-.548 0-.95-.12-1.208-.359-.258-.24-.295-.684-.113-1.333a13.934 13.934 0 0 0 .673-.673H7.71a93.782 93.782 0 0 0 1.807-1.844 15.623 15.623 0 0 0 1.707-2.099c-.25.047-.52.1-.81.163-.29.061-.586.12-.885.174-.299.054-.59.096-.872.127-.282.031-.54.047-.772.047-.3 0-.565-.024-.798-.07-.232-.046-.402-.124-.51-.232-.108-.108-.15-.255-.125-.44.025-.186.137-.41.336-.673.067-.062.229-.17.486-.325.258-.155.573-.325.947-.51.374-.186.785-.375 1.233-.568.449-.194.902-.371 1.358-.534a14.01 14.01 0 0 1 1.346-.406c.44-.108.826-.162 1.159-.162.481 0 .868.1 1.158.302.291.2.436.525.436.974 0 .433-.203 1.024-.61 1.774s-1.092 1.712-2.056 2.887v.302h.847c.864 0 1.608.07 2.23.208.623.14 1.134.333 1.533.58.398.248.69.541.872.882.183.34.274.71.274 1.113 0 .526-.162 1.086-.486 1.681-.324.596-.772 1.187-1.345 1.774a13.757 13.757 0 0 1-2.056 1.705 16.163 16.163 0 0 1-2.604 1.45c-.938.417-1.93.75-2.977.997S6.422 19 5.342 19h-.635c-.208 0-.411-.015-.61-.046Z" />
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-extrabold text-[#364F6B] mb-2">Incrementar la eficiencia en los tiempos de producción y distribución</h2>
                                    <p class="text-slate-500">Proporciona un plan maestro de producción tomando en cuenta qué y cuánto se debe fabricar o aprovisionar, el tiempo de fabricación y el plazo de entrega de cada producto.</p>
                                </div>
                                <img class="mx-auto max-md:-translate-x-6" src="https://cdn.devdojo.com/images/november2020/feature-graphic.png" width="330" height="280" alt="Illustration 3">
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

                    </div>
                </div>
            </div>
        </section>
        </div>
    </body>
</html>
