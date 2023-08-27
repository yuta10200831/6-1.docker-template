<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>トップページ</title>
    <!-- Tailwind CSS を読み込む -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto py-10">
        <h2 class="text-2xl font-semibold mb-4">お問い合わせフォーム</h2>
        <p>以下のフォームからお問い合わせください。</p>
        <form action="complete.php" method="post" class="mt-6">
            <div class="mb-4">
                <label for="title" class="block text-sm text-gray-600">タイトル(必須)</label>
                <input type="text" class="form-input border border-gray-300" name="title" id="title">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-600">Email(必須)</label>
                <input type="email" class="form-input border border-gray-300" name="email" id="email">
            </div>
            <div class="mb-6">
                <label for="content" class="block text-sm text-gray-600">お問い合わせ内容(必須)</label>
                <textarea class="form-textarea border border-gray-300" name="content" id="content" rows="6"></textarea>
            </div>
            <button class="bg-indigo-500 text-white py-2 px-6 rounded hover:bg-indigo-600" type="submit">送信</button>
        </form>
    </div>
</body>
</html>
