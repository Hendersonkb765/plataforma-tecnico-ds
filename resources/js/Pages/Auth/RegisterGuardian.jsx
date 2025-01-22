import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
    
        password_confirmation: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('register.teacher'), {
            onFinish: () => reset('password', 'password_confirmation'),
        });
    };

    return (
        <GuestLayout>
            <Head title="Registrar - Responsavel" />

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="name" value="Nome" />

                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />

                    <InputError message={errors.name} className="mt-2" />
                </div>
                

                <div className="mt-4">
                    <InputLabel htmlFor="nickname" value="Usuário" />

                    <TextInput
                        id="nickname"
                        name="nickname"
                        value={data.nickname}
                        className="mt-1 block w-full"
                        autoComplete="nickname"
                        onChange={(e) => setData('nickname', e.target.value)}
                        required
                    />

                    <InputError message={errors.nickname} className="mt-2" />
                </div>
                <div className="mt-4">
                    <InputLabel htmlFor="phone" value="Celular" />

                    <TextInput
                        id="phone_number"
                        type="tel"
                        name="phoneNumber"
                        value={data.phoneNumber}
                        className="mt-1 block w-full"
                        autoComplete="tel"
                        onChange={(e) => setData('phoneNumber', e.target.value)}
                        required
                    />
             
                    <InputError message={errors.phoneNumber} className="mt-2" />
                </div>
                <div className="mt-4">
                    <InputLabel  value="Responsavel por" />

                    <TextInput
                        id="guardian"
                        name="responsibleFor"
                        value={data.responsibleFor}
                        className="mt-1 block w-full"
                        autoComplete="responsible_for"
                        onChange={(e) => setData('responsibleFor', e.target.value)}
                        required
                    />

                    <InputError message={errors.responsibleFor} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Senha" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel
                        htmlFor="password_confirmation"
                        value="Confirmar Senha"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) =>
                            setData('password_confirmation', e.target.value)
                        }
                        required
                    />

                    <InputError
                        message={errors.password_confirmation}
                        className="mt-2"
                    />
                </div>

                <div className="mt-4 flex items-center justify-end">
                    <Link
                        href={route('login')}
                        className="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton className="ms-4" disabled={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
