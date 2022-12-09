<x-general.section sectionClass="py-7">
    <div class="col-9 text-center mx-auto">
	<h3 class="mb-5">{{ $header }}</h3>
    </div>
    @foreach ($blogs as $post)
    <x-cards.blog :blog=$post />
    @endforeach
</x-general.section>
