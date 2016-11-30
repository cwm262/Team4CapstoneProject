<html>
<head></head>
<body>
<h1>{{$title}}</h1>
<ul>
@foreach ($shoppingList as $item)
    <li>
        <ul>
            <h3>{{ $item->item->item_name }}</h3>
            <li>Number of Containers: {{$item->quantity}}</li>
        <ul>
    </li>
@endforeach
</ul>
<h1>Your Recommended Smart Shopping List</h1>
<h3>PantryWizard recommends you purchase these in addition to your above list:</h3>
<ul>
@foreach ($smartShoppingList as $item)
    <li>
        <ul>
            <h3>{{ $item->item_name }}</h3>
            <li>Number of Extra Containers: {{$item->quantity}}</li>
        <ul>
    </li>
@endforeach
</ul>
</body>
</html>