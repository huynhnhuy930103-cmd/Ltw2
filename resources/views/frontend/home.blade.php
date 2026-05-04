<x-layout-site title="Trang chủ">
    <x-slider />

    <div class="container mx-auto px-4 py-8 space-y-12">

        <!-- CATEGORY -->
        <x-home-list-category :categories="$categories" />

        <!-- NEW PRODUCT -->
        <x-product-new :product="$product_new" />

        <!-- SALE PRODUCT -->
        <x-product-sale :product="$product_sale" />

    </div>

</x-layout-site>

<style>
    /* Animation slider của bạn */
    @keyframes slide-infinite {

        0%,
        15% {
            transform: translateX(0);
        }

        20%,
        35% {
            transform: translateX(-100%);
        }

        40%,
        55% {
            transform: translateX(-200%);
        }

        60%,
        75% {
            transform: translateX(-300%);
        }

        80%,
        95% {
            transform: translateX(-400%);
        }

        100% {
            transform: translateX(0);
        }
    }

    .animate-infinite-slideshow {
        display: flex;
        width: 500%;
        animation: slide-infinite 20s infinite ease-in-out;
    }

    .slide-item {
        width: 100%;
        flex-shrink: 0;
    }
</style>