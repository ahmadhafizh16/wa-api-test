## PHP laravel Assignment 241030
### Make WhatsApp API server (whatsapp api clone)

#### Tech stack
- Laravel 10
- [Apiato 12](https://apiato.io/docs/getting-started/introduction)
- Soketi (websocket)
- PostgreSQL 
- Misc :
   - Laravel Telescope, For monitoring event [Online On Test App](http://ahmadhafizhm.my.id/telescope/events)


## Required APIs

1. Create chatroom
2. list chatroom (pagination or Infinie scroll needs)
3. Leave chatroom
4. Enter chatroom
5. Send mesasge
    1. Should be able to send text message.
    2. Should be able to send attachmemt. (NO LIMIT SIZE)
        1. the attachment saved on the local server directory “root/picture”, “root/video”.
6. list messages

## Additionally API 
1. Leave chat room
    - Prevent owner to leave chat room
 
 2. Join Chat room
    - Add DB Transaction to prevent race condition when joining channel
 
 3. Delete Chat API
     - Delete sent message
 
 4. Update Chat room name
 
 5. Send Message
    - Added Reply feature
 
 6. Get All Channel that is not subscribed by the user
    - Paginated result
 
 ## Infrastructure Condition
 - Using Laravel Framework v10
 
 - DB Schema
 ```mermaid
 erDiagram
    USERS {
        bigint id PK
        string name
        string email
        timestamp email_verified_at
        string password
        string gender
        date birth
        string remember_token
        timestamp created_at
        timestamp updated_at
    }
    
    CHAT_ROOMS {
        uuid id PK
        string name
        bigint user_count
        bigint owner_id FK
        timestamp created_at
        timestamp updated_at
    }
    
    SUBSCRIPTIONS {
        bigint id PK
        bigint user_id FK
        uuid chat_room_id FK
        timestamp created_at
        timestamp updated_at
    }

    CHAT_MESSAGES {
        bigint id PK
        uuid chat_room_id FK
        bigint sender_id FK
        jsonb content
        timestamp created_at
        timestamp updated_at
    }

    USERS ||--o{ CHAT_ROOMS : "owns"
    USERS ||--o{ SUBSCRIPTIONS : "has many"
    USERS ||--o{ CHAT_MESSAGES : "sends"
    
    CHAT_ROOMS ||--o{ CHAT_MESSAGES : "has many"
    CHAT_ROOMS ||--o{ SUBSCRIPTIONS : "has many subscribers"

    SUBSCRIPTIONS }o--|| USERS : "belongs to"
    SUBSCRIPTIONS }o--|| CHAT_ROOMS : "subscribes to"
    CHAT_MESSAGES }o--|| USERS : "sent by"
    CHAT_MESSAGES }o--|| CHAT_ROOMS : "belongs to"
```

- Folder and project structure using Porto Software Design Patter
- Websocket Presence Channel Laravel (Using Soketi)
Example Socketi Logs :
- User Joined WS Log:
![Screenshot_161](https://github.com/user-attachments/assets/2f228557-dc0e-4b2c-a8b8-392ac586d46c)

- User Leave Channel Log:
![Screenshot_162](https://github.com/user-attachments/assets/572b3d68-9c0f-4df6-9609-5637fe0bd40c)

- User Send Message Log:
![image](https://github.com/user-attachments/assets/22320be3-4a0c-46e9-8a59-3ebfb8c967aa)

## Condition
- All chat room have **500 Maximum member**

## Required

- Need API documentations
   - Using apidocJS [This Online Test App Docs Here](http://ahmadhafizhm.my.id/docs/private)
   - [Postman Collection](http://ahmadhafizhm.my.id/docs/private) RECOMMENDED for testing send message with attachment (apidocJS cannot accommodate to sent binary file)
- deploy the api server on the online
   - Online [App](http://ahmadhafizhm.my.id/)
- clean code.
- Linter using PHPStan

