<form method="POST" action="/admin/products/{{ $product->id }}">
@csrf
@method('PUT')

<input name="name" value="{{ $product->name }}">
<input name="price" value="{{ $product->price }}">

<button>Cập nhật</button>

</form>