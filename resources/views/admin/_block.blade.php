<div class="row">
    <a href="{{ route('check.show',$block->id) }}" class="col-md-2">{{ $block->begin_at }}</a>
    <div class="col-md-1">{{ $block->amount }}</div>
    <div class="col-md-3">{{ $block->phone }}</div>
    @if($block->checked == null)
        <div class="col-md-2">未审核</div>
    @elseif($block->checked == 1)
        <div class="col-md-2">已通过</div>
    @else
        <div class="col-md-2">已拒绝</div>
    @endif
    <div class="col-md-2"><button class="btn btn-success" onclick="event.preventDefault();
        document.getElementById('form-pass{{ $block->id }}').submit();
        ">通过</button> </div>
    <div class="col-md-2"><button class="btn btn-danger" onclick="event.preventDefault();
        document.getElementById('form-refuse{{ $block->id }}').submit();
        ">拒绝</button> </div>
    <form action="{{ route('check.pass',$block->id) }}" method="post" id="form-pass{{ $block->id }}" style="display: none">
        {{ csrf_field() }}
    </form>
    <form action="{{ route('check.refuse',$block->id) }}" method="post" id="form-refuse{{ $block->id }}" style="display: none">
        {{ csrf_field() }}
    </form>
</div>