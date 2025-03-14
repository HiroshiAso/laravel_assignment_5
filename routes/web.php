    <?php

    use Illuminate\Support\Facades\Route;
    use App\Models\Clothes;

    // メインページのルート - 全件取得、一件取得、ID指定取得を表示
    Route::get('/', function () {
        // TODO: 全件取得
        $allClothes = [];

        // 最初の1件取得
        $firstClothes = [];

        // デフォルトのID指定 (検索前は空にしておく)
        $clothesById = null;
        $searchId = null;

        return view('clothes', compact('allClothes', 'firstClothes', 'clothesById', 'searchId'));
    });

    // ID検索用のルート
    Route::get('/search', function () {
        // TODO: 全件取得
        $allClothes  = [];

        // TODO: 最初の1件取得
        $firstClothes = [];

        // ID指定取得
        $searchId = request('id');
        $clothesById = null;

        if ($searchId) {
            try {
                // TODO:IDで検索したデータを取得
                $clothesById = [];
            } catch (\Exception $e) {
                // 見つからない場合は null のまま
            }
        }

        return view('clothes', compact('allClothes', 'firstClothes', 'clothesById', 'searchId'));
    })->name('search');
