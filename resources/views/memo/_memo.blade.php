<div class="col-md-3">{{ $memo->begin_at }}</div>
<a class="col-md-6" href="{{ route('memo.show',$memo->id) }}" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $memo->info }}</a>
<div class="memo-btn">
    <a class="btn btn-warning memo-btn-left" href="{{ route('memo.edit',$memo->id) }}">修改</a>
    <button class="btn btn-danger memo-btn-right" onclick="document.getElementById('delete-form{{ $memo->id }}').submit();">删除</button>
</div>
<form action="{{ route('memo.destroy',$memo->id) }}" style="display: none;" method="post" id="delete-form{{ $memo->id }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>