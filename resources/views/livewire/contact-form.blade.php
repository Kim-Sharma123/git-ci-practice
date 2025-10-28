<div style="max-width: 500px; margin: auto; text-align: center;">
    <h2>Contact Us</h2>

    @if($successMessage)
        <div style="color: green; margin-bottom: 15px;">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <!-- Name -->
        <div style="margin-bottom: 10px;">
            <input type="text" wire:model.defer="name" placeholder="Your Name" style="width:100%; padding:8px;" />
            @error('name') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div style="margin-bottom: 10px;">
            <input type="email" wire:model.defer="email" placeholder="Your Email" style="width:100%; padding:8px;" />
            @error('email') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <!-- Message -->
        <div style="margin-bottom: 10px;">
            <textarea wire:model.defer="message" placeholder="Your Message" style="width:100%; padding:8px;"></textarea>
            @error('message') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" style="padding:10px 20px;">Send Message</button>
    </form>
</div>
