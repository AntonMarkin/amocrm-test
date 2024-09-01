@extends('layout')

@section('title', 'amoCRM test')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Создать сделку:</h2>
            <form class="comment-form" onsubmit="trackTime()" method="post" action="{{ route('create') }}" >
                @csrf
                <input type="hidden" name="half_minute_trigger" id="half_minute_trigger">
                <div class="card mb-2">
                    <div class="card-body">
                        <input name="price" type="number" class="form-control" placeholder="Цена" required>
                        <input name="name" type="text" class="form-control" placeholder="Имя" required>
                        <input name="phone" type="text" class="form-control" placeholder="Телефон" required>
                        <input name="email" type="email" class="form-control" placeholder="Почта" required>
                    </div>
                    <div class="card-footer text-body-secondary">
                        <input type="submit" class="btn btn-dark" value="Отправить">
                    </div>

                </div>
            </form>
            <h2>Сделки:</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($leads as $lead)
                    <div class="col">
                        <div class="card mt-2 text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{$lead->name}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        let startTime = Date.now();

        function trackTime() {
            const endTime = Date.now()
            let timeTrigger = 0
            if ((endTime - startTime) / 1000 >= 30) {
                timeTrigger = 1
            }
            document.getElementById('half_minute_trigger').value = timeTrigger
        }
    </script>
@endsection
