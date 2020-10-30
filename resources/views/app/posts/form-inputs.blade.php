@php $editing = isset($post) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="blog_id" label="Blog" required>
            @php $selected = old('blog_id', ($editing ? $post->blog_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Blog</option>
            @foreach($blogs as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="authror_id" label="User" required>
            @php $selected = old('authror_id', ($editing ? $post->authror_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="title"
            label="Title"
            value="{{ old('title', ($editing ? $post->title : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea name="body" label="Body" maxlength="255" required
            >{{ old('body', ($editing ? $post->body : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
