<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-3 bg-primary font-poppins rounded-lg text-white uppercase hover:bg-primary-100 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
