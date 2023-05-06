{{-- <form action="/test1" method="Post"> --}}
    <form action="/unicode" method="Post">
        <div>
            <input type="text" placeholder="Nhập họ và tên" name="fullname">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </div>
        <button type="submit">Submit</button>
    </form>
