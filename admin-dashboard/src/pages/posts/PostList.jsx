import { useNavigate, NavLink } from "react-router";
import { usePost } from "../../contexts/PostContext";
import { CardAction, CardFooter, PrimaryButton } from "../../components/ui";
import { primaryButtonStyle } from "../../components/forms";

export function PostList() {
    const navigate = useNavigate();
    const {posts} = usePost();
    console.log(posts)

    const imageCss = "size-36 bg-gray-500 mb-3 rounded-full shadow-lg";
    return (
        <section>

            <div className="flex flex-col items-center justify-start sm:flex-row sm:justify-between gap-4">
                <h1 className='text-3xl font-medium'>Publicaciones</h1>
                <NavLink to={'./registrar'} className={primaryButtonStyle}>
                    Registrar Publicación
                </NavLink>
            </div>
            <div className='mt-4 grid grid-cols-[repeat(auto-fit,minmax(16rem,1fr))] gap-4'>
            {posts.length === 0 && <p className="max-w-md">Preciona el boton <b>Registrar Publicación</b> para comenzar a mostrar publicaciones en tu sitio web</p>}

            {posts?.map(post => (
                <CardAction 
                    key={post.id}
                    extraClass="items-center">
                    <p className='mb-3 text-xl font-medium text-gray-900 dark:text-white'>{post.title}</p>
                    {post.image 
                        ? <img className={imageCss + " size-12"} src={post.image} /> 
                        : <div className={imageCss + " size-12"}></div>
                    }
                    {post.excerpt &&
                    <span className="text-2xl text-gray-500 dark:text-gray-400">{post?.excerpt}</span>
                    }
                    <CardFooter>
                        <PrimaryButton handleClick={() => navigate("./" + post.id)}>Editar</PrimaryButton>
                    </CardFooter>
                </CardAction>
            ))}
            </div>

        </section>

    );
}
