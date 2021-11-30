export default {
    // Endpoints
    loginEndpoint: '/api/login',
    logoutEndpoint: '/api/logout',
    userInfo: '/api/me',
    registerEndpoint: '/jwt/register',
    refreshEndpoint: '/jwt/refresh-token',

    // This will be prefixed in authorization header with token
    // e.g. Authorization: Bearer <token>
    tokenType: 'Bearer',

    // Value of this property will be used as key to store JWT token in storage
    storageTokenKeyName: 'accessToken',
    storageRefreshTokenKeyName: 'refreshToken',
}
