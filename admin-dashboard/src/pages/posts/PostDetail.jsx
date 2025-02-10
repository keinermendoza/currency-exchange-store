import { useEffect } from "react";
import { useParams, NavLink, useNavigate } from "react-router";
import { useForm, Controller } from "react-hook-form";
import { usePost } from "../../contexts/PostContext";
import { fetchPostForm } from "../../services/fetchPost";
import { CardAction, CardFooter, PrimaryButton } from "../../components/ui";
import {ImageField, inputTextStyle} from "../../components/forms";
import {ModalDelete} from "../../components/ModalDelete";
import { fetchPost } from "../../services/fetchPost";
import { ComeBackLink } from "../../components/ComeBackLink";
import {displayResponseMessages} from "../../lib/utils";

export  function PostDetail() {
  let { id } = useParams();
  const endpoint = "posts/" + id;
  const navigate = useNavigate();
  const {getPost, removePost, updatePost} = usePost();
  const post = getPost(id)
  
  const { register, handleSubmit, setValue, setError, watch, control, formState: { errors, isSubmitting } } = useForm();
  
  const onSubmit = async (data) => {
    console.log(data)

    const newData = {...data, "_method":"PUT"}
    const formData = new FormData();
    Object.entries(newData).forEach(
      ([key, value]) => {
        if (value !== null && value !== undefined && value !== "") {
          formData.append(key, value)
        }
      }
    );
    const response = await fetchPostForm(endpoint, formData);

    displayResponseMessages(response, data, setError);

    if (!response.errors) {
      navigate("../");
      updatePost(id, response.data)
    }

  }

  const deletePost = async () => {
      const response = await fetchPost(endpoint, null, "DELETE");
      displayResponseMessages(response, {}, setError);
      
      if (!response.errors) {
        removePost(id);
        navigate("../");
      }
    }

  // update fields when data is loaded  
useEffect(() => {
  console.log(post)
  if (post) {
    setValue("title", post.title || ""); 
    setValue("excerpt", post.excerpt == "null" ? "" : post.excerpt); 
    setValue("body", post.body == "null" ? "" : post.body);
    setValue("show_in_home",  post.show_in_home ?? 0); 
  }
}, [post, setValue]);

const showInHome = watch("show_in_home");
  return (
    <section>
      <ComeBackLink />

       <h1 className="text-3xl font-medium">Editando Publicación: <b>{post?.title}</b></h1>

      <form className="max-w-sm" onSubmit={handleSubmit(onSubmit)} >
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
              initialImage={post?.image} 
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
            checked={showInHome == 1}
            value="1"
            name="show_in_home"
            label="Mostar en página principal"
          />
          <Radio 
          
          required 
          register={register} 
          checked={showInHome == 0}

          value="0"
          name="show_in_home"
          label='Mostrar solo en página de publicaciones'
          />

        </div>


         <CardFooter extraClass="justify-end">
           <PrimaryButton
             isDisabled={isSubmitting}
          
           >Guardar Cambios</PrimaryButton>
         </CardFooter>

         </CardAction>
       </form> 


       
       <div className="mt-12 w-full max-w-4xl flex flex-col sm:flex-row gap-4 justify-between items-center">
         <div className="w-full max-w-lg">
           <p className="text-lg mb-2">Eliminar Publicación</p>
           <p>Esta acción no puede ser revertida</p>
         </div>

         <ModalDelete 
             isDisabled={isSubmitting}

         deleteButtonText="Eliminar Publicación"
         deleteCallback={deletePost}>
           <h3 className="mb-2 text-lg text-gray-500 dark:text-gray-400">Estás seguro de que quieres eliminar esta Publicación?</h3>
         </ModalDelete>
       </div>

    </section>
  )
}


export function Input({register, name, label, errors, placeholder="", ...rest}) {
  return (

  <div>
  <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white" htmlFor={name}>{label}</label>
  {errors[name] && <p className="text-red-800 font-medium">{errors[name].message}</p>}
  <input 
  id={name}
  placeholder={placeholder} 
  className={inputTextStyle}
  {...register(name, {...rest})}  
  />
</div>
  )

}

export function Textarea({register, name, label, errors, placeholder="", rows="3", ...rest}) {
  return (
    <div>
      <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white" htmlFor={name}>{label}</label>
      {errors[name] && <p className="text-red-800 font-medium">{errors[name].message}</p>}
      <textarea 
        cols="30" 
        rows={rows}
        id={name}
        placeholder={placeholder} 
        className={inputTextStyle}
        {...register(name, {...rest})}  
        ></textarea>
    </div>
  )

}


export function Radio({ label, labelClassName = "", value, register, name, ...rest }) {
  const sufix = Math.random();
  const randomId = name + sufix; 
  return (
    <div className="flex items-center" >
      <input
      value={value}

      className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
      id={randomId} 
      type="radio" 
      {...register(name)} 
      {...rest}  />
      <label
      className="ms-4 text-sm font-medium text-gray-900 dark:text-gray-300" 
      htmlFor={randomId} >{label}</label>
    </div>
  );
}



