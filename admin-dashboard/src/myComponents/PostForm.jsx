import { useEffect } from "react";
import { Input, Textarea, Radio } from "./InputForm";
import { ImageField } from "./ImageField";
import { useForm, Controller } from "react-hook-form";
import { CardAction, CardFooter, PrimaryButton } from "./Card";

export function PostForm({initialData, onSubmit, initialImage, buttonText}) {

  const { register, handleSubmit, reset, setValue, setError, watch, control, formState: { errors, isSubmitting } } = useForm({defaultValues: initialData});


  useEffect(() => {
    if (initialData) {
      reset(initialData);
    }
  }, [initialData, reset]);

  const showInHome = watch("show_in_home");

  return (
    <form className="max-w-sm" onSubmit={handleSubmit(data => onSubmit(data, setError))} >
       <CardAction extraClass="gap-4">
       <Input 
        name="title"
        register={register}
        errors={errors}
        label="Titulo"

          placeholder="Mi Publicación"

          required={{value: "Proporciona un titulo"}}
          maxLength={{value:50, message: "el titulo debe tener maximo 50 letras"}}
          minLength={{value:3, message: "el titulo debe tener minimo 3 letras"}}
       />

      <Controller
        control={control}
        name={"image"}
        render={({ field: { value, onChange, ...field } }) => { 
          return (
            <ImageField
              {...field}
              ImageClassName="w-full object-cover h-60"
              value={value?.fileName}
              initialImage={initialImage} 
              onChange={(event) => {
                onChange(event.target.files[0]);
              }
            }
            />
          );
        }}
      />


      <Textarea 
        name="excerpt"
        register={register}
        errors={errors}
        label="Resumen"
        placeholder="Esta publicación se trata sobre ..."
       />


      <Textarea 
        name="body"
        register={register}
        errors={errors}
        label="Contenido"
        rows="8"
        placeholder="El tema que hoy trataremos es muy importante..."
       />

      <div className="flex flex-col gap-2" >
          <p className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visibilidad</p>
          <Radio 
            required
            register={register}
            value="1"
            name="show_in_home"
            label="Mostar en página principal"
          />
          <Radio 
          required 
          register={register} 
          value="0"
          name="show_in_home"
          label='Mostrar solo en página de publicaciones'
          />

        </div>


         <CardFooter extraClass="justify-end">
           <PrimaryButton
             isDisabled={isSubmitting}
          
           >{buttonText}</PrimaryButton>
         </CardFooter>

         </CardAction>
       </form> 
  )
}
