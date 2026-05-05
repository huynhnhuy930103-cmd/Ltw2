<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-8 mt-10">

    <h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        ❓ Câu hỏi thường gặp (FAQ)
    </h1>

    <div class="space-y-4">

        <!-- Item -->
        <div class="border rounded-lg">
            <button onclick="toggleFAQ(1)" class="w-full text-left px-4 py-3 font-semibold text-pink-600 flex justify-between items-center">
                Mất bao lâu để nhận hàng?
                <span>+</span>
            </button>
            <div id="faq1" class="hidden px-4 pb-4 text-gray-700">
                Thời gian giao hàng từ 2-5 ngày tùy khu vực.
            </div>
        </div>

        <div class="border rounded-lg">
            <button onclick="toggleFAQ(2)" class="w-full text-left px-4 py-3 font-semibold text-pink-600 flex justify-between items-center">
                Tôi có được kiểm tra hàng trước khi thanh toán không?
                <span>+</span>
            </button>
            <div id="faq2" class="hidden px-4 pb-4 text-gray-700">
                Có, bạn được kiểm tra hàng trước khi thanh toán (COD).
            </div>
        </div>

        <div class="border rounded-lg">
            <button onclick="toggleFAQ(3)" class="w-full text-left px-4 py-3 font-semibold text-pink-600 flex justify-between items-center">
                Shop có hỗ trợ đổi trả không?
                <span>+</span>
            </button>
            <div id="faq3" class="hidden px-4 pb-4 text-gray-700">
                Có, shop hỗ trợ đổi trả trong vòng 7 ngày nếu sản phẩm lỗi.
            </div>
        </div>

        <div class="border rounded-lg">
            <button onclick="toggleFAQ(4)" class="w-full text-left px-4 py-3 font-semibold text-pink-600 flex justify-between items-center">
                Có những hình thức thanh toán nào?
                <span>+</span>
            </button>
            <div id="faq4" class="hidden px-4 pb-4 text-gray-700">
                Bạn có thể thanh toán bằng COD, chuyển khoản hoặc ví điện tử.
            </div>
        </div>

        <div class="border rounded-lg">
            <button onclick="toggleFAQ(5)" class="w-full text-left px-4 py-3 font-semibold text-pink-600 flex justify-between items-center">
                Làm sao để liên hệ shop?
                <span>+</span>
            </button>
            <div id="faq5" class="hidden px-4 pb-4 text-gray-700">
                Bạn có thể liên hệ qua hotline hoặc trang liên hệ trên website.
            </div>
        </div>

    </div>

</div>

<!-- JS -->
<script>
function toggleFAQ(id) {
    const el = document.getElementById("faq" + id);
    el.classList.toggle("hidden");
}
</script>