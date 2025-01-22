import { useState } from 'react';

const InputWithPreview = () => {
    const [inputValue, setInputValue] = useState('');
    const [imagePreview, setImagePreview] = useState(null);

    const handleInputChange = (event) => {
        setInputValue(event.target.value);
    };

    const handleImageChange = (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                setImagePreview(reader.result);
            };
            reader.readAsDataURL(file);
        }
    };

    return (
        <div className="mt-1 block w-full">
            
            {/* Upload de Imagem */}

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" for="file_input">Upload file</label>
            <input
                type="file"
                onChange={handleImageChange}
                accept="image/*"
                className="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            />
            
            {/* Preview da imagem */}
            {imagePreview && (
                <img
                    src={imagePreview}
                    alt="Preview"
                    className="mt-4 w-40 h-40 object-cover rounded-lg border"
                />
            )}
        </div>
    );
};

export default InputWithPreview;
