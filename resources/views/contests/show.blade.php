<h1>{{ $contest->title }}</h1>

@if($contest->image)
    <img src="{{ asset('storage/'.$contest->image) }}"
         width="400">
@endif

<p>
    Период проведения:
    {{ $contest->start_date->format('d.m.Y') }}
    —
    {{ $contest->end_date->format('d.m.Y') }}
</p>

<hr>

<p>{{ $contest->description }}</p>

<hr>

<h2>Принять участие</h2>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('contests.apply', $contest) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div>
        <label>ФИО:</label><br>
        <input type="text" name="full_name" required>
    </div>

    <div>
        <label>Email:</label><br>
        <input type="email" name="email" required>
    </div>

    <div>
        <label>Телефон:</label><br>
        <input type="text" name="phone">
    </div>

    <div>
        <label>Комментарий:</label><br>
        <textarea name="comment"></textarea>
    </div>

    <div>
        <label>Прикрепить работу:</label><br>
        <input type="file" name="work_file" required>
    </div>

    <br>

    <button type="submit">
        Участвовать
    </button>
</form>
