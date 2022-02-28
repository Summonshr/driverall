<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel and Tours Pvt Ltd</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="min-h-screen relative bg-background">
    <section>
        <div class="max-w-6xl flex-normal py-8">
            <a href="">
                <h2 class="">{{config('app.name')}}</h2>
            </a>
            <div class="flex-grow max-w-lg hidden md:block">
                <ul class="flex-grow flex max-w-lg  flex-wrap justify-around">
                    <li class="font-bold border-b-2 border-focused "><a href="/">Home</a></li>
                    <li><a href="/">Capabilities</a></li>
                    <li><a href="/">About</a></li>
                    <li><a href="/">Blog</a></li>
                    <li><a href="/">Contact</a></li>
                </ul>
            </div>
            <div x-data="{open:false}" x-cloak class="md:hidden">
                <div x-show="open" x-transition:enter="transition duration-300 transform ease-out" x-transition:enter-start="scale-25" x-transition:leave="transition duration-100 transform ease-in" x-transition:leave-end="opacity-0 scale-90" class="fixed top-0 left-0 w-full mt-8 flex items-center justify-center">
                    <ul @click.away="open=false" class="bg-theme max-w-xs w-full">
                        <li class="px-4 py-2 w-full font-bold bg-focused"><a href="/">Home</a></li>
                        <li class="px-4 py-2 w-full"><a href="/">Capabilities</a></li>
                        <li class="px-4 py-2 w-full"><a href="/">About</a></li>
                        <li class="px-4 py-2 w-full"><a href="/">Blog</a></li>
                        <li class="px-4 py-2 w-full"><a href="/">Contact</a></li>
                    </ul>
                </div>
                <button class="outline-none" @click="open=!open">
                    <i class="material-icons text-theme">menu</i>
                </button>
            </div>
        </div>
    </section>
    <section>
        <div class=" mx-auto max-w-6xl flex flex-wrap justify-between flex-col-reverse md:flex-row">
            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <h2 class="mb-6">We help people to start with Travel and tourism</h2>
                <p class="mb-8 border-l-[3px] pl-2 py-2 border-light">Our services can encompass any combination of the
                    followings.</p>
                <div>
                    <button class="theme">Schedule A consultation</button>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-wrap ">
                <div class="p-2 w-1/2 flex justify-end">
                    <div class="bg-cover rounded-tl-[100px] rounded-br-[100px] rounded-bl-[30px] rounded-tr-[30px] bg-no-repeat h-64 w-48" style="background-image: url(/images/image-1.jpeg)">
                    </div>
                </div>
                <div class="p-2 w-1/2 flex justify-start items-end">
                    <div class="bg-cover bg-no-repeat h-48 w-40 rounded-bl-[30px] rounded-t-[150px] rounded-br-[150px]" style="background-image: url(/images/image-2.jpeg)">
                    </div>
                </div>
                <div class="p-2 w-1/2 flex justify-end">
                    <div class="bg-cover bg-no-repeat h-48 w-40 rounded-tl-[150px] rounded-tr-[30px] rounded-b-[150px] " style="background-image: url(/images/image-3.jpeg)">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="bg-cover rounded-tl-[100px] rounded-br-[100px] rounded-bl-[30px] rounded-tr-[30px] bg-no-repeat h-64 w-48" style="background-image: url(/images/image-4.jpeg)">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="">
            <h6 class="font-semibold">About Us</h6>
            <h4 class="mb-8 tracking-wide">We are more than digital agency</h4>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex h-full"><img class="object-cover" src="/images/image-5.jpeg" alt=""></div>
                <div class="grid grid-rows-2 gap-4">
                    <img class="w-full" src="/images/image-6.jpeg" alt="">
                    <img class="w-full" src="/images/image-7.jpeg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            <div class="w-full">
                <h3 class="mb-2">Who are we</h3>
                <p class="mb-6 max-w-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis pariatur, ut eius
                    ex perspiciatis
                    placeat autem possimus natus cum quae, facere incidunt? Reprehenderit, neque! Ea fugit sequi
                    dolorum
                    nihil praesentium.</p>
                <a class="text-light font-semibold" href="/">Learn More <i class="pl-2 align-middle material-icons-outlined">east</i></a>
            </div>
            <div class="w-full">
                <h3 class="mb-2">What we do</h3>
                <p class="mb-6 max-w-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quod quasi
                    distinctio aliquam
                    corporis
                    necessitatibus deserunt, saepe tempora fuga cum quo atque odio. Laudantium, ea magni repudiandae
                    ratione dignissimos asperiores?</p>
                <a class="text-light font-semibold" href="/">Learn More <i class="pl-2 align-middle material-icons-outlined">east</i></a>
            </div>
        </div>
    </section>
    <section>
        <div class="lg:pt-16">
            <h6 class="text-center mb-4">Our services</h6>
            <h3 class="text-center mb-8">We are Master of Digital Agency</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  gap-2 sm:gap-4 md:gap-6">
                <p class="thumb">Marketing Digital <i class="float-right pl-2 align-middle material-icons-outlined">east</i></p>
                <p class="thumb">Game Design <i class="float-right pl-2 align-middle material-icons-outlined">east</i>
                </p>
                <p class="thumb">Social Media <i class="float-right pl-2 align-middle material-icons-outlined">east</i>
                </p>
                <p class="thumb">Digital Marketing <i class="float-right pl-2 align-middle material-icons-outlined">east</i></p>
                <p class="thumb active">Game Design <i class="float-right pl-2 align-middle material-icons-outlined">east</i></p>
                <p class="thumb">Media Advertising <i class="float-right pl-2 align-middle material-icons-outlined">east</i></p>
                <p class="thumb">Game Design <i class="float-right pl-2 align-middle material-icons-outlined">east</i>
                </p>
                <p class="thumb">User Analytics <i class="float-right pl-2 align-middle material-icons-outlined">east</i></p>
                <p class="thumb">Support <i class="float-right pl-2 align-middle material-icons-outlined">east</i></p>
            </div>
        </div>
    </section>
    <section>
        <div class="py-16 ">
            <h6 class="text-center mb-4">Why Chose Us</h6>
            <h4 class="text-center mb-8">We are Master of Digital Agency</h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 sm:gap-4 md:gap-8">
                <div class="text-center bg-lightest border border-lighter rounded shadow p-4 py-8">
                    <i class="material-icons-outlined text-5xl text-light">analytics</i>
                    <h5 class="mb-6">USER ANALYTICS</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda inventore quibusdam
                        necessitatibus impedit labore modi aperiam facilis quisquam quaerat perspiciatis eum omnis
                        pariatur
                        dolore odit nam sint, autem adipisci laboriosam?</p>
                </div>
                <div class="text-center bg-lightest border border-lighter rounded shadow p-4 py-8">
                    <i class="material-icons-outlined text-5xl text-light">multiline_chart</i>
                    <h5 class="mb-6">USER ANALYTICS</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda inventore quibusdam
                        necessitatibus impedit labore modi aperiam facilis quisquam quaerat perspiciatis eum omnis
                        pariatur
                        dolore odit nam sint, autem adipisci laboriosam?</p>
                </div>
                <div class="text-center bg-lightest border border-lighter rounded shadow p-4 py-8">
                    <i class="material-icons-outlined text-5xl text-light">bar_chart</i>
                    <h5 class="mb-6">USER ANALYTICS</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda inventore quibusdam
                        necessitatibus impedit labore modi aperiam facilis quisquam quaerat perspiciatis eum omnis
                        pariatur
                        dolore odit nam sint, autem adipisci laboriosam?</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-2 md:gap-6 py-4 md:py-16">
            <div class="col-span-3 flex items-center">
                <h3 class="max-w-lg">To achieve idea user experince for your audience, we just do not hold back.</h3>
            </div>
            <div class="col-span-2">
                <p class="max-w-sm mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Molestias, aut ad illum quidem ducimus ullam
                    minima nobis doloremque officiis quam perspiciatis blanditiis nemo qui! Similique, fugiat accusamus.
                    In, illum vero. loream
                </p>
                <button class="theme">Schedule A consultation</button>
            </div>
        </div>
    </section>
    <section class="bg-theme grid py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 w-full text-lighter mb-6 ">
            <div class="w-full">
                <h5 class="mb-4">ABOUT US</h5>
                <ul>
                    <li class="mb-2"><a href="">who we are</a></li>
                    <li class="mb-2"><a href="">what are we</a></li>
                    <li class="mb-2"><a href="">Our team</a></li>
                </ul>
            </div>
            <div>
                <h5 class="mb-4">RESOURCES</h5>
                <ul>
                    <li class="mb-2"><a href="">Blog</a></li>
                    <li class="mb-2"><a href="">Site of Audit</a></li>
                    <li class="mb-2"><a href="">Case studies pages</a></li>
                </ul>
            </div>
            <div>
                <h5 class="mb-4">SOCIAL</h5>
                <ul>
                    <li class="mb-2">
                        <span class="text-4xl mr-2 material-icons-outlined">facebook</span>
                        <span class="text-4xl mr-2 material-icons-outlined">add_to_drive</span>
                        <span class="text-4xl mr-2 material-icons-outlined">linkedin</span>
                    </li>
                </ul>
            </div>
            <div>
                <h5 class="mb-4">Contact Us</h5>
                <ul>
                    <li class="mb-2"><a href="">summonshr@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="flex w-full flex-wrap shadow">
                <div class="flex flex-grow border md:border-r-0 items-center border-light border-r-none p-2">
                    <span><i class="material-icons-outlined">phone</i></span>
                    <div class="text-lighter">
                        <p>Phone</p>
                        <p class="text-lighter">+9779841145614</p>
                    </div>
                </div>
                <div class="flex flex-grow items-center border border-light p-2">
                    <span><i class="material-icons-outlined">location_on</i></span>
                    <div class="px-4">
                        <p class="text-lighter">Location</p>
                        <p class="text-lighter">Kathmandu, Nepal</p>
                    </div>
                </div>
                <div class="flex flex-grow items-center md:border-l-0 border border-light p-2">
                    <span><i class="material-icons-outlined">mail</i></span>
                    <div class="px-4">
                        <p class="text-lighter">Email</p>
                        <p class="text-lighter">summonshr@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @production
   <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v10.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
   @endProduction
    <div class="fb-customerchat" attribution="biz_inbox" page_id="101424575461674">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js" integrity="sha512-Atu8sttM7mNNMon28+GHxLdz4Xo2APm1WVHwiLW9gW4bmHpHc/E2IbXrj98SmefTmbqbUTOztKl5PDPiu0LD/A==" crossorigin="anonymous"></script>
</body>

</html>