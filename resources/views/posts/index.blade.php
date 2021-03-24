@extends('layouts.app')
@section('title') Главная @endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="flex justify-center">
                <span class="font-bold text-xl m-4">Learning Blog</span>
            </div>
            <div class="flex-col">
                <div class="mb-5">
                    <hr>
                    <p class="my-3 text-lg font-medium">Title</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consectetur deserunt dignissimos distinctio earum, esse explicabo inventore molestias non, nostrum pariatur perspiciatis quas quasi, reprehenderit saepe sit tenetur. Ad animi architecto asperiores consequatur consequuntur cupiditate deserunt dignissimos dolore, dolorum eaque est eveniet ex exercitationem fugiat fugit harum id ipsa ipsam iure labore laborum, modi nemo nihil praesentium qui quod suscipit, tempore tenetur voluptates voluptatibus? Ab accusamus accusantium alias consectetur cumque doloremque, eos et exercitationem facere illum incidunt inventore ipsa ipsum laboriosam magni maxime molestias mollitia nam nesciunt non nostrum, numquam odio omnis perferendis perspiciatis praesentium quia quo recusandae reiciendis repellendus repudiandae sunt temporibus ullam! Aspernatur atque dolore doloribus eaque esse tenetur voluptas! Aliquam at consequuntur dicta eaque eveniet facere harum ipsum quidem reprehenderit sint. A animi cum, cupiditate debitis deleniti distinctio enim eum expedita fugiat in labore laborum minus quasi qui sit unde vero voluptatibus! Aliquid odio quod repellat vitae!</p>
                    <p class="mt-2">Автор: Юзернейм</p>
                    <div class="flex mt-3">
                        <p class="mr-3"><i class="far fa-heart"></i> 52</p>
                        <p class="mr-3"><i class="far fa-comment-alt"></i> 13</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
