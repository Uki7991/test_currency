<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="padding: 20px;">
        <p>EUR/USD: {{ $exchangeRateEUR->rates->USD * (100 + $option->percent) / 100 }}$</p>
        <p>USD/EUR: {{ $exchangeRateUSD->rates->EUR * (100 + $option->percent) / 100 }}€</p>
    </div>

    <form style="padding: 20px;" action="{{ url('/option') }}" method="POST">
        @csrf
        <input type="text" name="percent" id="percent" value="{{ $option->percent }}">
        <button type="submit">Save</button>
    </form>
</body>
</html>
