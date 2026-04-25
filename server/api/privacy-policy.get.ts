import policyDocument from '../../privacy_policy.json'

export default defineEventHandler((event) => {
  setHeader(event, 'content-type', 'application/json; charset=utf-8')
  return policyDocument
})
