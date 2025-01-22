
import React from 'react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import { Link, useForm } from '@inertiajs/react';
import { Description } from '@headlessui/react';


export default function RegisterActivity() {

    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        description: '',
        expirationDate: '',
        maxGrade: '',
        maxScore: '',
        link: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('activities.store'), {
        });
    };
    return (
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

        <div>
            <InputLabel htmlFor="description" value="Descrição" />


            <TextInput
                id="description"
                name="description"
                value={data.description}
                className="mt-1 block w-full"
                autoComplete="description"
                type="text"
                isFocused={true}
                onChange={(e) => setData('description', e.target.value)}
                required
            />

            <InputError message={errors.description} className="mt-2" />
        </div>
        

        
        <div className="mt-4">
            <InputLabel htmlFor="expirationDate" value="Até " />

            <TextInput
                id="expirationDate"
                type="date"
                name="expirationDate"
                value={data.expirationDate}
                className="mt-1 block w-full"
                autoComplete="tel"
                onChange={(e) => setData('expirationDate', e.target.value)}
                required
            />

            <InputError message={errors.expirationDate} className="mt-2" />
        </div>

        <div className="mt-4">

            <InputLabel htmlFor="maxGrade" value="Máximo de Nota" />

            <TextInput
                id="maxGrade"
                type="number"
                name="maxGrade"
                value={data.maxGrade}
                className="mt-1 block w-full"
                autoComplete="maxGrade"
                onChange={(e) => setData('maxGrade', e.target.value)}
                required
            />

            <InputError message={errors.maxGrade} className="mt-2" />
        </div>

    <div className="mt-4">
            <InputLabel
                htmlFor="maxScore"
                value="Máximo de Pontos"
            />

            <TextInput
                id="maxScore"
                type="number"
                name="maxScore"
                value={data.maxScore}
                className="mt-1 block w-full"
                autoComplete="maxScore"
                onChange={(e) =>
                    setData('maxScore', e.target.value)
                }
                required
            />

            <InputError
                message={errors.maxScore}
                className="mt-2"
            />
        </div>

           

        <div className="mt-4">
            <InputLabel
                htmlFor="link"
                value="Link para a atividade"
            />

            <TextInput
                id="link"
                type="url"
                name="link"
                value={data.link}
                className="mt-1 block w-full"
                autoComplete="link"
                onChange={(e) =>
                    setData('link', e.target.value)
                }
            />

            <InputError
                message={errors.link}
                className="mt-2"
            />
        </div>
        <div className="mt-4 flex items-center justify-end">
          

            <PrimaryButton className="ms-4" disabled={processing}>
                Cadastrar
            </PrimaryButton>
        </div>
    </form>
    );
}

