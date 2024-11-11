<form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">City Name:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="photo">City Photo:</label>
        <input type="file" name="photo" accept="image/*" required>
    </div>
    <button type="submit">Submit</button>
</form>
