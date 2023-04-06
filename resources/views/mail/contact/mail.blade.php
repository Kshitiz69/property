<x-mail::message>
    Hi {{$recipient->name}} 👋🏻,

    I hope this message finds you well.

    We wanted to let you know that one of our app users is interested in a property listed
    on your platform and has requested additional information.

    The property {{$property->title}}, located at
    {{$property->location}}
    which our user found particularly appealing.

    Would it be possible for you to provide additional information about the property,
    such as pricing, availability, or any other relevant details?

    The user is eager to learn more and is looking forward to hearing back from you.
    @if($recipient->name != 'Admin')

    If you're able to provide more information, please feel free to contact the
    user directly at {{$user['email']}} | {{$user['phone']}}.

    If you have any questions or concerns, please don't hesitate to reach out to us.

    Thank you for your time and consideration, and we look forward to hearing back from you soon.

    @endif
The details of the following user is provided below:
<x-mail::table>
    | Name                | Phone                   | Email               |
    | ---------------     | -------------------     | ---------------     |
    |{{$user['name']}}    |   {{$user['phone']}}    |  {{$user['email']}} |
</x-mail::table>

<x-mail::button :url="$url" color="success">
View Property Details
</x-mail::button>

Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
