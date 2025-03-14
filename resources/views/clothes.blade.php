<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>洋服データベース演習</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .section-title {
            background-color: #343a40;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #495057;
            color: white;
            font-weight: bold;
        }
        .header-section {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        hr.section-divider {
            border-top: 3px dashed #6c757d;
            margin: 40px 0;
        }
        .search-form {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .clothes-category {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.8rem;
            font-weight: bold;
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header-section">
        <div class="container">
            <h1 class="text-center">Laravel 洋服データベース演習</h1>
            <p class="text-center">Model・ルーティング・Bladeを使ったデータ取得方法</p>
        </div>
    </div>

    <div class="container">
        <!-- 全件取得セクション -->
        <section id="all-clothes">
            <h2 class="section-title">パターン1: 全件取得</h2>
            <p class="mb-4">データベースから洋服のデータを全件取得して表示します。<code>Model::all()</code> を使います。</p>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>カテゴリー</th>
                            <th>色</th>
                            <th>サイズ</th>
                            <th>価格</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allClothes as $clothes)
                        <tr>
                            <td>{{ $clothes->id }}</td>
                            <td>{{ $clothes->name }}</td>
                            <td><span class="clothes-category">{{ $clothes->category }}</span></td>
                            <td>{{ $clothes->color }}</td>
                            <td>{{ $clothes->size }}</td>
                            <td>¥{{ number_format($clothes->price) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <hr class="section-divider">

        <!-- 1件取得セクション -->
        <section id="first-item">
            <h2 class="section-title">パターン2: 先頭の1件取得</h2>
            <p class="mb-4">データベースから最初の1件のみ取得して表示します。<code>Model::first()</code> を使います。</p>

            @if($firstClothes)
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $firstClothes->name }}
                        </div>
                        <div class="card-body">
                            <p><strong>カテゴリー:</strong> <span class="clothes-category">{{ $firstClothes->category }}</span></p>
                            <p><strong>色:</strong> {{ $firstClothes->color }}</p>
                            <p><strong>サイズ:</strong> {{ $firstClothes->size }}</p>
                            <p><strong>価格:</strong> ¥{{ number_format($firstClothes->price) }}</p>
                            <p><strong>説明:</strong> {{ $firstClothes->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-warning">
                データがありません。
            </div>
            @endif
        </section>

        <hr class="section-divider">

        <!-- ID指定取得セクション -->
        <section id="item-by-id">
            <h2 class="section-title">パターン3: ID指定で取得</h2>
            <p class="mb-4">指定したIDの洋服データを取得して表示します。<code>Model::find($id)</code> や <code>Model::findOrFail($id)</code> を使います。</p>

            <div class="search-form">
                <form action="{{ route('search') }}" method="get">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="id" class="col-form-label">ID検索:</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" id="id" name="id" class="form-control" min="1"
                                value="{{ $searchId }}" placeholder="洋服IDを入力" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </div>
                </form>
            </div>

            @if($clothesById)
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            ID: {{ $clothesById->id }} - {{ $clothesById->name }}
                        </div>
                        <div class="card-body">
                            <p><strong>カテゴリー:</strong> <span class="clothes-category">{{ $clothesById->category }}</span></p>
                            <p><strong>色:</strong> {{ $clothesById->color }}</p>
                            <p><strong>サイズ:</strong> {{ $clothesById->size }}</p>
                            <p><strong>価格:</strong> ¥{{ number_format($clothesById->price) }}</p>
                            <p><strong>説明:</strong> {{ $clothesById->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($searchId)
            <div class="alert alert-danger">
                ID: {{ $searchId }} の洋服データは見つかりませんでした。
            </div>
            @else
            <div class="alert alert-info">
                IDを入力して検索してみましょう。
            </div>
            @endif
        </section>

        <div class="mt-5 mb-5 text-center text-muted">
            <p>Laravel データベース処理演習</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
