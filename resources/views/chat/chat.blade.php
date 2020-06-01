@extends('layouts.chat-base')

@section('content')
    <div class="row justify-content-center h-100">
        @include('chat.conversations')
        @include('chat.conversation.card')
    </div>
@endsection
