<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>トップページ</title>
    <!-- Tailwind CSS を読み込む -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<?php if (isset($_SESSION["username"])): ?>
    <!-- ログイン済みの場合、ユーザー名とログアウトボタンを表示 -->
    <p>ようこそ、<?php echo $_SESSION["username"]; ?>さん！</p>
    <a href="logout.php" class="bg-red-500 text-white py-2 px-6 rounded hover:bg-red-600">ログアウト</a>
<?php else: ?>
    <!-- 未ログインの場合、ログインボタンと新規登録ボタンを表示 -->
    <a href="login.php" class="bg-indigo-500 text-white py-2 px-6 rounded hover:bg-indigo-600">ログイン</a>
    <a href="register.php" class="bg-green-500 text-white py-2 px-6 rounded hover:bg-green-600">新規登録</a>
<?php endif; ?>

<section class="text-gray-600 body-font relative">
    <div class="absolute inset-0 bg-gray-300">
        <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=%C4%B0zmir+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
    </div>
    <form action="complete.php" method="post">
    <div class="container px-5 py-24 mx-auto flex">
        <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">お問い合わせフォーム</h2>
            <p class="leading-relaxed mb-5 text-gray-600">以下のフォームからお問い合わせ下さい</p>
        <div class="relative mb-4">
            <label for="title" class="leading-7 text-sm text-gray-600">タイトル(必須)</label>
            <input type="title" id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email(必須)</label>
            <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="content" class="leading-7 text-sm text-gray-600">お問い合わせ内容(必須)</label>
            <textarea id="content" name="content" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
        </div>
            <button class="bg-indigo-500 text-white py-2 px-6 rounded hover:bg-indigo-600" type="submit">送信</button>
        </div>
    </form>
    </div>
</section>

</body>
</html>
